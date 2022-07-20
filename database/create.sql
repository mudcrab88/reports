CREATE TABLE IF NOT EXISTS sales (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    brand TEXT NOT NULL,
    model TEXT NOT NULL,
    vin TEXT UNIQUE NOT NULL,
    engine_volume REAL NOT NULL,
    power INTEGER NOT NULL,
    gearbox_type TEXT NOT NULL,
    year_prod INTEGER NOT NULL,
    sale_date TEXT NOT NULL,
    dealer TEXT NOT NULL
);