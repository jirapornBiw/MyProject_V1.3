CREATE TABLE order_detail (
  id int(10) NOT NULL auto_increment,
  order_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  qty int(11) NOT NULL,
  subtotal float NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE order_detail (
  id int(10) NOT NULL auto_increment,
  p_id int(11) NOT NULL,
  qty int(11) NOT NULL,
  pricetotal float NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


