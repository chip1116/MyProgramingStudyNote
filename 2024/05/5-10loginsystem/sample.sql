--customer(顧客）テーブルの作成

CREATE TABLE customer( 
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    address VARCHAR (100),
    login VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(256) --ハッシュ化したときに256以上になるからサイズ気を付ける

);

-- 購入テーブルを作る(FKキー(外部制約キー)を使ってほかのテーブルと紐づける)
CREATE TABLE purchase(
    id INT PRIMARY KEY auto_INCREMENT,
    customer_id  INT,
    FOREIGN KEY (customer_id) REFERENCES customer(id) --前者が外部キー、後半が参照先　テーブル（キー）
   
);

-- 購入詳細テーブルを作る(複合キー)
CREATE TABLE purchase_detail(
    purchase_id INT,
    product_id  INT,
    count INT,
    PRIMARY KEY(purchase_id,product_id)
);

-- お気に入りテーブル
CREATE TABLE favorite(
    customer_id INT,
    product_id INT,
        PRIMARY KEY(customer_id,product_id)
);

-- 顧客テーブルにデータを挿入する（新規登録する）

INSERT INTO customer VALUES(
    NULL,
    '熊木　和夫',
    '東京都新宿区西新宿2-8-1','kumaki','BearTreel'
);