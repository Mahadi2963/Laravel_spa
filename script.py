import numpy as np
import pandas as pd
from sklearn.ensemble import RandomForestRegressor
from sqlalchemy import create_engine, Column, Integer, String, Float, Boolean, ForeignKey, DateTime
from sqlalchemy.orm import declarative_base, sessionmaker, relationship
import sys
import datetime

# Define the base model for SQLAlchemy ORM
Base = declarative_base()

# Define Models based on your migration tables

class User(Base):
    __tablename__ = 'users'
    id = Column(Integer, primary_key=True)
    name = Column(String)
    email = Column(String, unique=True)
    contact = Column(String)
    password = Column(String)
    role = Column(String)
    is_verified = Column(Boolean, default=False)
    created_at = Column(DateTime, default=datetime.datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.datetime.utcnow, onupdate=datetime.datetime.utcnow)
    student = relationship("Student", back_populates="user", uselist=False)
    teacher = relationship("Teacher", back_populates="user", uselist=False)


class Student(Base):
    __tablename__ = 'students'
    id = Column(Integer, primary_key=True)
    user_id = Column(Integer, ForeignKey('users.id', ondelete='CASCADE'))
    student_id = Column(String)
    image = Column(String)
    created_at = Column(DateTime, default=datetime.datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.datetime.utcnow, onupdate=datetime.datetime.utcnow)
    user = relationship("User", back_populates="student")
    marks = relationship("Mark", back_populates="student")


class Teacher(Base):
    __tablename__ = 'teachers'
    id = Column(Integer, primary_key=True)
    user_id = Column(Integer, ForeignKey('users.id', ondelete='CASCADE'))
    teacher_id = Column(String)
    image = Column(String)
    created_at = Column(DateTime, default=datetime.datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.datetime.utcnow, onupdate=datetime.datetime.utcnow)
    user = relationship("User", back_populates="teacher")
    marks = relationship("Mark", back_populates="teacher")


class Subject(Base):
    __tablename__ = 'subjects'
    id = Column(Integer, primary_key=True)
    name = Column(String, unique=True)
    image = Column(String)
    created_at = Column(DateTime, default=datetime.datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.datetime.utcnow, onupdate=datetime.datetime.utcnow)


class Mark(Base):
    __tablename__ = 'marks'
    id = Column(Integer, primary_key=True)
    student_id = Column(Integer, ForeignKey('students.id', ondelete='CASCADE'))
    subject_id = Column(Integer, ForeignKey('subjects.id', ondelete='CASCADE'))
    teacher_id = Column(Integer, ForeignKey('teachers.id', ondelete='CASCADE'))
    subject_name = Column(String)
    predicted_marks = Column(Float)
    final_grade = Column(String)
    present_count = Column(Float, default=0.0)
    absent_count = Column(Float, default=0.0)
    classTest_1 = Column(Float, default=0.0)
    Lab_Test1 = Column(Float, default=0.0)
    mid_mark = Column(Float, default=0.0)
    classTest_2 = Column(Float, default=0.0)
    Lab_Test2 = Column(Float, default=0.0)
    assignment = Column(Float, default=0.0)
    external_activity = Column(Float, default=0.0)
    recommendations = Column(String(1000))  # Increased length to handle longer text
    created_at = Column(DateTime, default=datetime.datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.datetime.utcnow, onupdate=datetime.datetime.utcnow)
    student = relationship("Student", back_populates="marks")
    teacher = relationship("Teacher", back_populates="marks")

# MySQL Database Connection
engine = create_engine('mysql+pymysql://root:@127.0.0.1:3306/laravel_spa_db')
Session = sessionmaker(bind=engine)
session = Session()

# Load training data and train the model
dataset_path = 'C:/Users/mdmeh/OneDrive/Desktop/ml/training_data_final.csv'
training_data = pd.read_csv(dataset_path)

# Preprocess the training data
training_data.replace("00", np.nan, inplace=True)
numeric_columns = training_data.select_dtypes(include=[np.number]).columns
for column in numeric_columns:
    avg_mark = training_data[column].astype(float).mean()
    training_data.loc[:, column] = training_data[column].fillna(avg_mark)

# Separate features and target variable for training
X_train = training_data.drop(columns=['Final_Grade', 'student_id'])
y_train = training_data['Final_Grade']

# Train the model
rf_model = RandomForestRegressor(n_estimators=100, random_state=42)
rf_model.fit(X_train, y_train)

# Prediction function
def predict_and_update_marks(student_id, subject_id):
    # Retrieve student marks from the database
    mark = session.query(Mark).filter_by(student_id=student_id, subject_id=subject_id).first()
    if not mark:
        print(f"No marks found for student {student_id} in subject {subject_id}")
        return

    # Extracting mark input features from the database
    input_marks = np.array([[mark.present_count, mark.absent_count, mark.classTest_1, mark.Lab_Test1,
                             mark.mid_mark, mark.classTest_2, mark.Lab_Test2, mark.assignment, mark.external_activity]])

    # Predict marks
    input_marks_df = pd.DataFrame(input_marks, columns=X_train.columns)
    predicted_marks = rf_model.predict(input_marks_df)[0]

    # Generate recommendations
    recommendations = []
    if mark.present_count < 75:
        recommendations.append("Increase attendance to improve performance.")
    if mark.classTest_1 < 50:
        recommendations.append("Review class test 1 material.")
    if mark.Lab_Test1 < 50:
        recommendations.append("Consider additional lab practice for Lab Test 1.")
    if mark.mid_mark < 50:
        recommendations.append("Focus on improving your mid-term scores.")
    if mark.classTest_2 < 50:
        recommendations.append("Revise concepts for class test 2.")
    if mark.Lab_Test2 < 50:
        recommendations.append("Spend more time on lab exercises for Lab Test 2.")
    if mark.assignment < 50:
        recommendations.append("Improve assignment scores by practicing regularly.")
    if mark.external_activity < 50:
        recommendations.append("Participate in more external activities to boost skills.")

    # Update mark entry in database
    mark.predicted_marks = predicted_marks
    mark.recommendations = "\n".join(recommendations)
    session.commit()

    print(f"Predicted Marks for student {student_id} in subject {subject_id}: {predicted_marks}")
    print("Recommendations:")
    for recommendation in recommendations:
        print(f"- {recommendation}")

# Usage example
if __name__ == "__main__":
    student_id = sys.argv[1]
    subject_id = sys.argv[2]

    predict_and_update_marks(student_id, subject_id)
