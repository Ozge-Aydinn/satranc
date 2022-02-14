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
         
        }

        .black{
            background: black;
        }
        .white{
            background: white;
        }
        .red{
            background: red;
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
    //atın bulunduğu x ve y konumu
    $atX;
    $atY;
    $sag =1;  // 
    //atımızın hangi konumda olduğunu öğrenmek için iki boyutlu dizi oluşturup içerisini satranç tahtası kadar dolduruyoruz . Ardından random üretilen sayıya eşit olduğu anda x ve y değerlerini değişkene atıyoruz.
    $dizi = array();
    $diziSayac=0;
        for($x=0;$x<8;$x++) 
        {
            for($y = 0;$y<8;$y++) 
            {   
            $dizi[$x][$y] = $diziSayac;
            $diziSayac++;
                if ($dizi[$x][$y]==$randAt) 
                {
                $atX=$x;
                $atY=$y;
                }
            }
        }
    /*
           
            1. satır 0 dan siyahla  başlıyorsa 2. satırın beyazla başlaması lazım.  i ve k yı toplayıp modunu aldığımızda şartlar sağlanıyor

            0. satır + 0.süt, 1.süt, 2.süt...
            1 satır + 0. süt, 1.süt, 2 süt...
   

            0   1   2   3   4   5   6   7   
            9   10  11  12  13  14  15  16 
            19  20  21  22  23  24  25  26
            28  29  30  31  32  33  34  35
            ...

            bu komutu sürekli kullandığımız için function olarak tanımladım.

     */
    function sabitTahta($i,$k)
    {
        if (($i+$k)%2==0) 
        {
            echo "white'";
        }
        else 
        {
            echo "black'";
        }
    }
        

   echo "<table class='size' border=5 > "  ;

   //8*8 tablo oluştur
   for($i=0; $i<$row ; $i++)
   {
       echo "<tr> ";
       
        
        for ($k=0; $k < $col ; $k++) { 
            

             echo "<th class='";
             /*
             Satranç at hareketinde aritmetik bir düzen var.

             Örneğin;
             Atımız alan 37de ise 

             at          arit. oran          boyanacak alan
             37             -10                  = 27
             37             -17                  = 20
             37             -15                  = 22
             37             -6                   = 31
             37             +10                  = 47
             37             +17                  = 54
             37             +15                  = 52
             37             +6                   = 43
             
             boyacanak alanlar atımızın olduğu alanın 6,10,15,17 toplanmış ve çıkarılmış hali
             */


            
            /*
            kutu adedi kadar dönmüş bir sayacımız var 
            eğer sayac randAt'ımızın -17sine -15ine..... eşit olduğunda arkaplanını kırmızı yapıyoruz.
             
            */


            /*
            At tahtanın sol ve sağ iki köşesindeyken dışarıda kalan alanların boyanmaması gerekiyor. 
            Bunun için $atY= 0,1,6 ve 7 olduğunda dışarıda kalan alanları if döngüsünden çıkaracağız.

            */
            // 0 ve 7 de aynı işlemler olacak tek farklı (+'lar - ), (-'ler +) olacak
             if ($atY==0 || $atY==7) 
            {   
                
                if($atY==7)
                {$sag=-1;}
                else $sag=1;
                
                if($randAt+(6*$sag)==$sayac || $randAt-(10*$sag)==$sayac || $randAt+(15*$sag)==$sayac || $randAt-(17*$sag)==$sayac)
                {
                    sabitTahta($i,$k);
                
                }
                else if ($randAt-(6*$sag)==$sayac || $randAt+(10*$sag)==$sayac || $randAt-(15*$sag)==$sayac || $randAt+(17*$sag)==$sayac)
                {
                     echo "red'";
                }
                else {
                    sabitTahta($i,$k);
                }

                
            }

            else if ($atY==1 || $atY==6) 
            {
                if($atY==6)
                {$sag=-1;}
                else $sag=1;

                if($randAt+(6*$sag)==$sayac || $randAt-(10*$sag)==$sayac )
                {
                    sabitTahta($i,$k);
                
                }
                else if ($randAt-(6*$sag)==$sayac || $randAt+(10*$sag)==$sayac || $randAt-15==$sayac || $randAt+17==$sayac|| $randAt+15==$sayac || $randAt-17==$sayac)
                {
                     echo "red'";
                }
                else {
                    sabitTahta($i,$k);
                }

                
            }





            if($randAt-17==$sayac || $randAt-15==$sayac || $randAt-10==$sayac|| $randAt-6==$sayac|| $randAt+6==$sayac || $randAt+10==$sayac || $randAt+15==$sayac || $randAt+17==$sayac)
            {

                    echo "red'";
                
            }
            

            else
            sabitTahta($i,$k);
            
            echo ">";
                
            if ($sayac==$randAt) {
                echo "<img src='at.jpg' >";
                
            }

               
            //echo $sayac;

            echo "</th>";
            $sayac++;
  

       }
       echo "</tr>";
       
       
   }
   echo "</table>";





?>

</body>
</html>