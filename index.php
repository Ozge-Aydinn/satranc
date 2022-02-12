<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Satranç</title>
 

    <style>
        /* tablo özellikleri*/
        .size{
            width: 700px;
            height: 700px;
            /* sayfanın ortasında olsun*/
            margin-left: auto;
            margin-right: auto;
            /* 
            border-collapse: collapse;   :hücre aralarında tek çizgi olsun
            border-spacing:0;       :hücre aralarında ki boşluk 0 olsun*/
   
         
        }

        .black{
            background: blue;
        }
        .white{
            background: white;
        }
        img{
            width: 50px;
            height: 50px;      
          
        }
         
        table,th,tr{
            padding:0;
            margin:0;
                 
        }
        th{
            width:60px;
            height:60px;
        }
      

    </style>
</head>
<body>

<?php  
    
    $row=8;
    $col=8;
    $sayac=0;
    $randAt=rand(0,63);

   echo "<table class='size' border=5 > "  ;

   //8*8 tablo oluşturma
   for($i=0; $i<$row ; $i++)
   {
       echo "<tr> ";
       
        
        for ($k=0; $k < $col ; $k++) { 
            
            /*
           
            1. satır 0 dan siyahla  başlıyorsa 2. satırın beyazla başlaması lazım.  i ve k yı toplayıp modunu aldığımızda şartlar sağlanıyor

            0. satır + 0.süt, 1.süt, 2.süt...
            1 satır + 0. süt, 1.süt, 2 süt...
   

            0   1   2   3   4   5   6   7   
            9   10  11  12  13  14  15  16 
            19  20  21  22  23  24  25  26
            28  29  30  31  32  33  34  35
            ...

             */
            echo "<th class='";
            if (($i+$k)%2==0)
            {
                 echo "black'";
            }
            else {
                echo "white'";
            }
            
            echo ">";
                
            if ($sayac==$randAt) {
                echo "<img src='at.jpg' >";
            }

                
                
            echo $sayac;

            echo "</th>";
            $sayac++;
  

       }
       echo "</tr>";
       
       
   }
   echo "</table>";


?>

</body>
</html>