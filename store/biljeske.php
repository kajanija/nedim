if(mysqli_num_rows($query)<1){
        echo '<h1>Search for "'.$word.'": No Products</h1>';
        
    }else{
         echo '<h2 style="text-agiln:center;">PRODUCTS</h2>';
    }
                               
                               if(mysqli_num_rows($query)<1){
       echo '<h1>Search for "'.$word.'": No Blogs</h1>';
        
    }else{
         echo '<h2 style="text-agiln:center;">BLOGS:</h2>';
    }

Uredi postove u svi postovi da izgledaju zavisnosti od vrste (popust(obivan (neaktivan)))
dodati i search formu na search stranicu 
i dodati isto ovakav filter kao na posts stranici.

lista blogova

blog pojedinacno

post obicni bez velicina pojedinacno

post sa razlikom u boji i velicini ;S