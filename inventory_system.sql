-- Table: Categories
CREATE TABLE Categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: Products
CREATE TABLE Products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    stock INT DEFAULT 0,
    unitprice DECIMAL(10,2) NOT NULL,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    categoryid INT REFERENCES Categories(id)
);

-- Table: Suppliers
CREATE TABLE Suppliers (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT,
    contactperson VARCHAR(100),
    contact VARCHAR(50),
    email VARCHAR(100),
    notes TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: Purchases
CREATE TABLE Purchases (
    id SERIAL PRIMARY KEY,
    supplierid INT REFERENCES Suppliers(id),
    purchasedate DATE NOT NULL,
    description TEXT
);

-- Table: Purchase_items
CREATE TABLE Purchase_items (
    id SERIAL PRIMARY KEY,
    purchaseid INT REFERENCES Purchases(id),
    productid INT REFERENCES Products(id),
    quantity INT NOT NULL,
    unitcost DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);