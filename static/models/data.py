from utils.db import db

class Cars(db.Model):
    __tablename__ = 'cars'

    id = db.Column(db.Integer, primary_key=True)
    brand = db.Column(db.String(100), nullable=False)
    mode = db.Column(db.String(100), nullable=False)
    year = db.Column(db.Integer, nullable=False)
    region = db.Column(db.String(100), nullable=False)

    # Relationship with Sales
    sales = db.relationship('Sales', backref='car', lazy=True)

class Sales(db.Model):
    __tablename__ = 'sales'

    id = db.Column(db.Integer, primary_key=True)
    car_id = db.Column(db.Integer, db.ForeignKey('cars.id'), nullable=False)  # Foreign key linking to Cars
    value = db.Column(db.Integer, nullable=False)

    # Duplicate fields are removed; they can be accessed via the relationship
    brand = db.Column(db.String(100), nullable=False)
    mode = db.Column(db.String(100), nullable=False)
    year = db.Column(db.Integer, nullable=False)
    region = db.Column(db.String(100), nullable=False)
