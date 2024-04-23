-- データベースを作る

-- 予約語は大文字その他小文字

CREATE DATABASE sample;

-- テーブルの縦がカラム/フィールド,横がレコード
-- INT=整数,VARCHAR=文字　praimary key=主キー
-- できたデータベースからテーブルを作る

CREATE TABLE customer( 
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(30),
    address VARCHAR (100),
    tel VARCHAR(13)
);

-- 商品テーブルを作る
CREATE TABLE products(
    id INT PRIMARY KEY auto_INCREMENT,
    name VARCHAR(30),
    price INT
);

-- 受注テーブルを作る(FKキーを使ってほかのテーブルと紐づける)
CREATE TABLE orders(
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_date DATE NOT NULL,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES customer(id)
);

-- 受注明細テーブル
CREATE TABLE order_details(
    order_id INT,
    product_id INT,
    amount INT,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id),
    PRIMARY KEY(order_id, product_id)
);

-- 顧客テーブルにデータを挿入する（新規登録する）

INSERT INTO customer VALUES(
    NULL,
    '南北電機株式会社',
    '東京都品川区',
    '03-1111-2222'
);
INSERT INTO customer VALUES(
    NULL,
    '株式会社いろは電気',
    '東京都港区',
    '03-1234-4444'
);
INSERT INTO customer VALUES(
    NULL,
    '株式会社日本工業',
    '大阪府大阪市港区',
    '06-4444-5444'
);

-- 商品テーブルにデータを挿入する。
INSERT INTO products VALUES(
    NULL,
    'テレビ（4K)',
    200000
);
INSERT INTO products VALUES(
    NULL,
    'DVDレコーダー',
    80000
);
INSERT INTO products VALUES(
    NULL,
    'ラジオ',
    3000
);
INSERT INTO products VALUES(
    NULL,
    'テレビ',
    35000
);
-- INSERT INTO products VALUES
-- (NULL,'テレビ(4K)',200000),
-- (NULL,'テレビ',35000),
-- (NULL,'テレビ',35000),
-- (NULL,'テレビ',35000);

-- 受注テーブルにインサートする
INSERT INTO orders VALUES
(NULL,'2024-04-10',1),
(NULL,'2024-04-11',2),
(NULL,'2024-04-11',1),
(NULL,'2024-04-15',3);

-- 受注明細テーブル
INSERT INTO order_details VALUES
(1,1,3),
(1,2,1),
(2,2,5),
(2,3,8),
(3,4,7),
(4,1,2);

-- 顧客テーブルから全データを取得する（選択する）

SELECT*FROM customer;

-- 商品テーブルからIDと商品名を取得

SELECT id, name 
FROM products ;

-- 問題1 商品テーブルから商品名と単価を取得してください


-- 問題2　顧客テーブルからIDと顧客名を取得
SELECT id, name FROM customer;

-- 問題3　受注テーブルから全フィールドを取得
SELECT*FROM order_details;

-- 商品テーブルから価格50,000円以下の全フィールドを取得
SELECT*FROM products WHERE price <= 50000;

-- 顧客テーブルから顧客名が南北電機株式会社のidと住所
SELECT id, address
FROM customer
WHERE name = '南北電気株式会社';

-- 問題１商品テーブルから商品名がラジオの全フィールド
SELECT name FROM products WHERE name = 'ラジオ';

-- 問題2商品テーブルから価格が80,000以上の全フィールド
SELECT * FROM products WHERE price >= 80000;

-- 問題3受注テーブルから受注日が2024,4,11の受注id
SELECT id FROM orders WHERE order_date = '2024-04-11';

-- 問題1 受注テーブルから全フィールド
SELECT*FROM orders;

-- 問題2顧客テーブルからIDと名前と住所
SELECT id,name,address FROM customer;

-- 問題3商品テーブルから価格が80000円未満の全フィールド
SELECT*FROM products WHERE price < 80000; 

-- 問題4商品テーブルから価格が80000円の全フィールド
SELECT*FROM products WHERE price = 80000;

-- 問題5商品テーブルから価格が50000以上100000円以下の商品を全フィールド

SELECT*FROM products WHERE price >= 50000 && price <= 100000;
-- SELECT*FROM products WHERE price BETWEEN 50000 AND 100000; 以上以下の時だけ使える

-- 問題6商品テーブルから価格が50000未満または100000円以上の商品を全フィールド
SELECT*FROM products WHERE price <50000 || price >= 100000;

-- 問題7顧客テーブルから名前南北電気株式会社の全フィールド
SELECT*FROM customer WHERE name = '南北電気株式会社';

-- あいまい検索！顧客テーブルから名前南北電気株式会社の全フィールド(LIKE演算子)
SELECT*FROM customer WHERE name LIKE '南北電気%';

-- 顧客テーブルから名前に株式会社が含まれるデータの全フィールド(%で囲む)
SELECT*FROM customer WHERE name LIKE '%株式会社%';

-- 並び替え
-- 商品テーブルで価格の低い順に並べる(小さい順から並べることを昇順)ascをほんとは書くけど省略できるから書かない

SELECT* FROM products ORDER BY price;

-- 商品テーブルで価格の高い順に並べる（大きいほうから並べることを降順）
SELECT*FROM products ORDER BY price DESC;

-- 商品テーブルで10万円以下の商品を価格が低い順に並べる
SELECT*FROM products WHERE price <= 100000 ORDER BY price;

-- 商品明細テーブルで数量が5こ以下のデータを商品IDを昇順に並べる
SELECT*FROM order_details WHERE amount <= 5 ORDER BY product_id; 

-- 商品明細テーブルで数量が5以下のデータを商品idを昇順、数量を降順に並べる(,で区切れば２つ並べられる)
SELECT*FROM order_details WHERE amount <=5 ORDER BY product_id, amount DESC;

-- 取得する件数を制御
-- 商品テーブルを価格が30.000円以上の商品を価格が安い順に並べて一番安い商品を取得（LIMIT）

SELECT*FROM products WHERE price >= 30000 ORDER BY price LIMIT 1;

-- 問題１顧客テーブルから住所が東京都から始まる全フィールドをidが降順で取得
SELECT*FROM customer WHERE address LIKE '東京都%' ORDER BY id DESC;

-- 問題2受注テーブルから全フィールドを受注日が新しい順で3件のみ取得
-- ただし、受注日が同じ場合は顧客IDが小さい順で取得
SELECT*FROM orders ORDER BY order_date DESC, customer_id LIMIT 3;

-- 問題3受注明細テーブルで数量が5以上10以下の全フィールドを数量が小さい順で取得

SELECT*FROM order_details WHERE amount 5 BETWEEN 10 ORDER BY amount;

--結合(join)
-- 受注テーブルと顧客テーブルを結合 INNER JOIN ON
SELECT*FROM orders INNER JOIN customer ON customer.id = orders.customer_id;

-- 受注明細テーブルと商品テーブルを結合
SELECT*FROM order_details INNER JOIN products ON order_details.order_id = products.id;

-- 同じIDがあるとき
SELECT*FROM order_details INNER JOIN products ON order_details.order_id = products.id
WHERE orders.id = 3;
-- 順番は SELECT FROM INNERJOIN ON WHERE

-- - 受注テーブルと顧客テーブルを結合し受注idが3のレコードの受注id,受注日、顧客名を取得

SELECT orders.id,
       orders.order_date,
       customer.name 
FROM orders 
INNER JOIN customer 
ON customer.id = orders.customer_id
WHERE orders.id = 3;

-- 簡略版
-- ASで別名にできる（エイリアス）
SELECT o.id, o.order_date, c.name
FROM orders AS o
INNER JOIN customer AS c
ON c.id = o.customer_id
WHERE o.id = 3;

-- ASを省略
SELECT o.id, o.order_date, c.name
FROM orders o 
INNER JOIN customer c
ON c.id = o.customer_id
WHERE o.id = 3;

-- 受注明細テーブルと受注テーブルを結合
SELECT*FROM order_details 
INNER JOIN orders 
ON order_details.order_id = orders.id; 

-- 受注テーブルと顧客テーブルを結合
-- ヒント！受注テーブルの顧客id（customer_id）と顧客テーブルのid(id)がリレーション
SELECT*FROM orders
INNER JOIN customer 
ON customer.id = orders.customer_id; 
-- 簡略バージョン
SELECT*FROM orders o
INNER JOIN customer c
ON c.id = o.customer_id; 

-- 上記SQLをもとに顧客ID が1のレコードのみ選択

SELECT*FROM orders o
INNER JOIN customer c
ON c.id = o.id
WHERE o.customer_id =1;

-- 受注テーブルと顧客テーブルを結合し、受注日が2024年4月11日のレコードを取得
SELECT*FROM orders o
INNER JOIN customer c
ON c.id = o.customer_id
WHERE o.order_date  = '2024-04-11';

--受注明細テーブルと商品テーブルを結合してください
SELECT*FROM order_details o 
INNER JOIN products p
ON o.product_id = p.id;

--受注テーブルと受注明細テーブルを結合
SELECT*FROM order o 
INNER JOIN order_details od
ON od.order_id = o.id;