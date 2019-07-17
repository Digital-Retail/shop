<?php if(!empty($_SESSION['cart'])) : ?>
 <div class="table-responsive">
     <table class="table table-hover table-striped">
         <thead>
         <tr>
             <th>Фото</th>
             <th>Наименование</th>
             <th>Кол-во</th>
             <th>Цена</th>
             <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </th>
         </tr>
         <?php foreach ($_SESSION['cart'] as $id=>$item): ?>
         <tr>
             <td class="vcenter"><a href="/product/<?=$item['alias'] ?>" ><img  height="70px" src="/images/<?=$item['img']; ?>"></a></td>
             <td class="vcenter"><?=$item['title']; ?></td>
             <td class="vcenter"><?=$item['qty']; ?></td>
             <td class="vcenter"><?=$item['price']; ?></td>
             <td class="vcenter"><span class="glyphicon glyphicon-remove del-item text-danger" data-id="<?=$id ?>" aria-hidden="true"></span> </td>
         </tr>
             <?php endforeach; ?>
         <tr>
             <td>Итого:</td>
             <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty']; ?></td>
         </tr>
         <tr>
             <td>На сумму:</td>

             <th colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.currency']['simbol_left'].$_SESSION['cart.sum'].$_SESSION['cart.currency']['simbol_right']; ?></th>
         </tr>
         </thead>
     </table>
 </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
