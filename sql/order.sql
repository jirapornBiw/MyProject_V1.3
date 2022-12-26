CREATE TABLE orders(
  id int(10) NOT NULL auto_increment,
  dttm datetime NOT NULL,
  address varchar(500) collate utf8_unicode_ci NOT NULL,
  postcode varchar(500) collate utf8_unicode_ci NOT NULL,
  name varchar(100) collate utf8_unicode_ci NOT NULL,
  phone varchar(20) collate utf8_unicode_ci NOT NULL,
  total float NOT NULL,
  gmail varchar(100) collate utf8_unicode_ci NOT NULL,
  status varchar(100) collate utf8_unicode_ci NOT NULL,
  order_detail int NOT NULL AUTO_INCREMENT
  id_customer varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE orders(
  id int(10) NOT NULL auto_increment,
  dttm datetime NOT NULL,
  address varchar(500) collate utf8_unicode_ci NOT NULL,
  postcode varchar(500) collate utf8_unicode_ci NOT NULL,
  name varchar(100) collate utf8_unicode_ci NOT NULL,
  phone varchar(20) collate utf8_unicode_ci NOT NULL,
  total float NOT NULL,
  gmail varchar(100) collate utf8_unicode_ci NOT NULL,
  status varchar(100) collate utf8_unicode_ci NOT NULL,
  
  id_customer varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;