-- GET PRODUCTS WITH PRICES BY ORDER

select o.*,p.*, pr.*
from store3.Order o
inner join orderproduct op
on o.Order_id = op.OP_order_id 
inner join product p
on p.prod_id = op.OP_prod_id
inner join prodprices pr on
pr.PrPr_Prod_id = p.prod_id
where o.Order_id = $ID