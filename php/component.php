<?php

function component($itemname, $itemprice, $itemimg, $itemid){
    $element = "
                <form action=\"menu.php\" method=\"post\">
                 <div>
                            <img src=\"$itemimg\" class=\"img-rounded\" alt=\"Image1\">
                            <h3>$itemname</h3>
                            <h3>$itemprice rs</h3>
                            <button type=\"submit\" name=\"add\">Add to Cart </button>
                             <input type='hidden' name='item_id' value='$itemid'>
                           
                </form>
           </div>
    ";
    echo $element;
}

    function cartElement($itemimg, $itemname, $itemprice, $itemid , $itemQuantity){
        $element = "
            <form action=\"cart.php?action=remove&id=$itemid\" method=\"post\" class=\"cart-items\">
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        <img src=$itemimg alt=\"Image1\" class=\"img-fluid\">
                    </div>
                    <div class=\"col-md-6\">
                        <h5 class=\"pt-2\">$itemname</h5>
                        <h5 class=\"pt-2\">Rs$itemprice</h5>
                        <hr>
                        <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                    </div>
                    <div class=\"col-md-3 py-5\">
                        <div>
                            <button type=\"submit\" onclick=\"decreaseValue()\" class=\"btn bg-light border rounded-circle\" name=\"minus\"><i class=\"fas fa-minus\"></i></button>
                            <input type=\"text\" value=\"$itemQuantity\" class=\"form-control w-25 d-inline\">
                            <button type=\"submit\" onclick=\"increaseValue()\" class=\"btn bg-light border rounded-circle\" name=\"plus\" ><i class=\"fas fa-plus\"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        ";
        echo $element;
    }
    
    
                           













