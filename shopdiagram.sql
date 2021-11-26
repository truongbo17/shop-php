CREATE TABLE `role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(10)
);

CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `role_id` int,
  `username` varchar(100),
  `fullname` varchar(255),
  `email` varchar(255),
  `phonenumber` varchar(20),
  `address` varchar(500),
  `password` varchar(32),
  `thumbnail` varchar(500),
  `birthday` date,
  `story` varchar(500),
  `deleted` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `token` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `token` varchar(32),
  `created_at` datetime
);

CREATE TABLE `category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `name` varchar(100),
  `slug` varchar(100),
  `parent_id` int,
  `deleted` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `product` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `title` varchar(255),
  `slug` varchar(255),
  `description` longtext,
  `color` varchar(10),
  `size` varchar(5),
  `price` int,
  `discount` int,
  `view` int,
  `quantity` int,
  `sold` int,
  `deleted` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `product_category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `category_id` int,
  `created_at` datetime
);

CREATE TABLE `galery_product` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `thumbnail` varchar(500),
  `created_at` datetime
);

CREATE TABLE `shipping` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)
);

CREATE TABLE `order` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(255),
  `email` varchar(100),
  `phonenumber` varchar(20),
  `address` varchar(255),
  `note` varchar(255),
  `order_date` datetime,
  `status` int DEFAULT 0,
  `user_id` int,
  `role_id` int,
  `total_money` int,
  `orders_shipping` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `order_detail` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `price` int,
  `num` int,
  `total_money` int,
  `status` int DEFAULT 0,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `feedback` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `fullname` varchar(255),
  `email` varchar(100),
  `subject` varchar(50),
  `message` varchar(100),
  `status` int DEFAULT 0,
  `created_at` datetime
);

ALTER TABLE `user` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `token` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `order_detail` ADD FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

ALTER TABLE `order_detail` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`orders_shipping`) REFERENCES `shipping` (`id`);

ALTER TABLE `galery_product` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `category` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `product_category` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_category` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `feedback` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);


CREATE TABLE category_post(
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(100),
  created_at datetime,
  updated_at datetime
  );
CREATE TABLE post(
  id int PRIMARY KEY AUTO_INCREMENT,
  title varchar(255),
  slug varchar(255),
  user_id int,
  content longtext,
  created_at datetime,
  updated_at datetime
  );
CREATE TABLE post_category(
  id int PRIMARY KEY AUTO_INCREMENT,
  post_id int,
  category_id int,
  FOREIGN KEY (post_id) REFERENCES post(id),
  FOREIGN KEY (category_id) REFERENCES category_post(id),
  created_at datetime
  )
CREATE TABLE comment(
  id int PRIMARY KEY AUTO_INCREMENT,
  user_id int,
  product_id int,
  post_id int,
  comment varchar(255),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (product_id) REFERENCES product(id),
  FOREIGN KEY (post_id) REFERENCES post(id)
  )
