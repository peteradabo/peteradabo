-- Table: Categories
CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: Products
CREATE TABLE Products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    stock INT DEFAULT 0,
    unitprice DECIMAL(10,2) NOT NULL,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    categoryid INT,
    FOREIGN KEY (categoryid) REFERENCES Categories(id)
);

-- Table: Suppliers
CREATE TABLE Suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
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
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplierid INT,
    purchasedate DATE NOT NULL,
    description TEXT,
    FOREIGN KEY (supplierid) REFERENCES Suppliers(id)
);

-- Table: Purchase_items
CREATE TABLE Purchase_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchaseid INT,
    productid INT,
    quantity INT NOT NULL,
    unitcost DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (purchaseid) REFERENCES Purchases(id),
    FOREIGN KEY (productid) REFERENCES Products(id)
);