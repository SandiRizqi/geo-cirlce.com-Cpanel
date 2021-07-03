<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="/static/images/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo-Artificial Intelligence for Environment</title>
    <link rel="stylesheet" type="text/css" href="/static/css/indexstyle.css" media="all">
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/mapstyle.css">
    <link rel="stylesheet" href="/static/css/main.css">
    <link rel="stylesheet" href="/static/Libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
    <link rel="stylesheet" href="/static/Libs/v6.1.1-dist/ol.css">
    <script type="text/javascript" src="/static/Libs/v6.1.1-dist/ol.js"></script>
    <script src="https://unpkg.com/elm-pep"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="/static/Libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.polyfill.io/v3/polyfill.min.js?features=fetch,requestAnimationFrame,Element.prototype.classList,URL,TextDecoder"></script>
    <script src="https://unpkg.com/dom-to-image-more@2.8.0/dist/dom-to-image-more.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script type="text/javascript" src="/static/script/billing.js"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
    
<style>
  .map {
        position: absolute;
        width: 100%;
        height:100vh;
        z-index: 1;
      }
      
  input {
      float: left;
      
    }
    
    form {
      display: flex;
      flex-direction: column;
      padding: 0;
      align-items: flex-start;
    }

  
  .navbar {
    position: fixed;
    z-index: 3;
    background: linear-gradient(90deg,  #abebc6  , #27ae60 );
    width: 100%;
    }

  .formTable{
    background-color: #abebc6;
    position: absolute;
    top: 100px;
    right: 15px;
    z-index: 3;
    margin-left: 10px;
    border-radius: 4px;
      }

  .row-remove{
    background-color: #4ec27f;
    color: rgb(2, 82, 15)!important;
    font-size: 12px;
    text-align: center;
    font-family: "Rubik", sans-serif;
    border-radius: 5px;
    padding: 1px 5px;
    border: 2px solid #08500a; /* Green */
  }
  .row-remove:hover {
  box-shadow: 0 2px 10px 0 rgba(0,0,0,0.24), 0 13px 30px 0 rgba(0,0,0,0.19);}

  .row-pdf{
    background-color: #4ec27f;
    color: rgb(2, 82, 15)!important;
    font-size: 12px;
    text-align: center;
    font-family: "Rubik", sans-serif;
    border-radius: 5px;
    padding: 1px 5px;
    border: 2px solid #08500a; /* Green */
  }


  .row-pdf:hover {
  box-shadow: 0 2px 10px 0 rgba(0,0,0,0.24), 0 13px 30px 0 rgba(0,0,0,0.19);}

  .row-add{
    background-color: #4ec27f;
    color: rgb(2, 82, 15)!important;
    font-size: 12px;
    text-align: center;
    font-family: "Rubik", sans-serif;
    border-radius: 5px;
    padding: 1px 5px;
    border: 2px solid #08500a; /* Green */
  }
  .row-add:hover {
  box-shadow: 0 2px 10px 0 rgba(0,0,0,0.24), 0 13px 30px 0 rgba(0,0,0,0.19);}


  .pricing{
    background-color: #abebc6;
    position: absolute;
    bottom: 60px;
    left: 10px;
    z-index: 3;
    margin-left: 0px;
    border-radius: 10px;
      }

  .dropdown-menu {
    font-size: 15px;
    margin: 0px;
    font-weight: 500;
    background: #70cf99;
}
  .dropdown-item {
    font-size: 15px;
    color: #fff!important;
    margin: 0px;
    font-weight: 500;
    background: #70cf99 ;
}

  .dropdown-menu: hover {
    font-weight: 600;
    border-bottom: 1px solid #fff;
}

  .dropdown-item: hover {
  font-weight: 600;
  border-bottom: 1px solid #fff;
}
</style>
</head>


<body>
    
    <!-- cek apakah sudah login -->
    
    <?php
    
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}
	?>
	
  <header>
        <div class="menu-bar">
          <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
                  <a class="navbar-brand" href="#"><img src="/static/images/logo.png" alt="logo" href="/"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Satellite Imagery
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/login.php">Project Orders</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="/Satellite.html">Products Gallery</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/geoai.html">Geo-Artificial Intelligence </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://api.whatsapp.com/send/?phone=6282170829587&text&app_absent=" >Contact Us</a>
                      </li>
                    </ul>
                  </div>
          </nav>
        </div>   
  </header>

  <!--Map-->
<div id="map" class="map">
  <script type="text/javascript" src="/static/script/map.js"></script>
  <pre id="info"></pre>
  <table class="formTable">
      <tbody>
      <tr>
      <td>
      <b style="margin-left: 10px;"> Kawasan Hutan</b>
      <br>
      <table style="margin-left: 10px;">
      <tbody><tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgUc7//2nxCDrciZGFAOpBUYNHDVw1MBRA+lsIKw8o5qB1AIA7eQFBmQc9I4AAAAASUVORK5CYII=" alt="KSA-KPA dan TB">
      </td><td>KSA-KPA dan TB</td>
      </tr>
      <tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADtJREFUOI1jYaAyYKGZgf8Z/v+n1DBGBkZGFnQBcg2DOYh2Xh41cNTAUQNHDcRpICVlIqzoY0EXoBQAAAUwCVSt5BgFAAAAAElFTkSuQmCC" alt="KSA-KPA Laut">
      </td><td>KSA-KPA Laut</td>
      </tr>
      <tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgdW/Gf5TYlArKwMjioHUAqMGjho4auCogXQ2EFaeUc1AagEAOHUD3J7mvX4AAAAASUVORK5CYII=" alt="Hutan Lindung">
      </td><td>Hutan Lindung</td>
      </tr>
      <tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgf/+rfpPiUFMTGGMKAZSC4waOGrgqIGjBtLZQFh5RjUDqQUAzmcErFw/4EgAAAAASUVORK5CYII=" alt="Hutan Produksi">
      </td><td>Hutan Produksi</td>
      </tr>
      <tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgQf+Lf9PiUEOTJGMKAZSC4waOGrgqIGjBtLZQFh5RjUDqQUA5PoE7V1IHKsAAAAASUVORK5CYII=" alt="Hutan Produksi Terbatas">
      </td><td>Hutan Produksi Terbatas</td>
      </tr>
      <tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgf9WrvxPiUFM4eGMKAZSC4waOGrgqIGjBtLZQFh5RjUDqQUA6/YFAkwbBHkAAAAASUVORK5CYII=" alt="Hutan Produksi yang dapat dikonversi">
      </td><td>Hutan Produksi yang dapat dikonversi</td>
      </tr>
      <tr valign="middle">
      <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgf////9PiUGMjIyMKAZSC4waOGrgqIGjBtLZQFh5RjUDqQUAsNMEVanlzFgAAAAASUVORK5CYII=" alt="Areal Penggunaan Lain">
      </td><td>Areal Penggunaan Lain</td>
      </tr>
      </table>
      </tbody>
  </table>

  <div id="pricing" style="margin-left: 1cm; margin-right: 1cm; margin-top: 18cm;">
    <form id="cart" class="pricing" style="margin-top: 5cm;">
      <td><b style="margin-left: 10px; margin-top: 10px;">Cost Planer</b></td>
      <table name="cart" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;" width="600">
        <tr>
          <th></th>
          <th style="text-align:center;">Orders</th>
          <th style="text-align:left;">Luas(ha)</th>
          <th style="text-align:center;">Price</th>
          <th>&nbsp;</th>
          <th style="text-align:center;">Item Total</th>
        </tr>

        <tr class="line_items">
          <td><button class="row-remove">Remove</button></td>
          <td name="item_citra" value="1">
            <select name="citra">
              <option value="2,000.00">Citra SPOT</option>
              <option value="3,000.00">Citra Planet Scope</option>
              <option value="5,000.00">Citra Worldview</option>
              <option selected value="2,500.00">Citra Pleiades</option>
            </select>
          </td>
          <td><input type="text" name="luas" value="100" style="text-align: right; width: 100%;"></td>
          <td><input type="text" name="price" value="" jAutoCalc= "{citra}" style="width: 100%; text-align: right;"></td>
          <td>&nbsp;</td>
          <td><input type="text" name="item_total" value="" jAutoCalc="{luas} * {price}" style="text-align: right;"></td>
        </tr>

        <tr>
          <th></th>
          <th style="text-align:center;">Services</th>
          <th style="text-align:left;">Jumlah</th>
          <th style="text-align:center;">Price</th>
          <th>&nbsp;</th>
          <th style="text-align:center;">Item Total</th>
        </tr>

        <tr class="line_items_post_lyt">
          <td><button class="row-remove">Remove</button></td>
          <td>Post-Processing</td>
          <td><input type="text" name="jmlcitra" value="1" style="width: 50%;text-align: right;"></td>
          <td><input type="text" name="cost" value="750,000.00" style="width: 100%; text-align: right;" ></td>
          <td>&nbsp;</td>
          <td><input type="text" name="item_total" value="" jAutoCalc="{jmlcitra} * {cost}" style="text-align: right;"></td>
        </tr>
        <tr class="line_items_post_dgts">
          <td><button class="row-remove">Remove</button></td>
          <td>Digitasi</td>
          <td><input type="text" name="luasdigit" value="1" style="width: 50%;text-align: right;"></td>
          <td><input type="text" name="costdigit" value="750,000.00" style="width: 100%; text-align: right;"></td>
          <td>&nbsp;</td>
          <td><input type="text" name="item_total" value="" jAutoCalc="{luasdigit} * {costdigit}" style="text-align: right;"></td>
        </tr>
        
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>Subtotal</td>
          <td>&nbsp;</td>
          <td><input type="text" name="sub_total" value="" jAutoCalc="SUM({item_total})" style="text-align: right;"></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>
            <select name="tax">
              <option value=".06">Tax</option>
              <option selected value=".00">Tax Free</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><input type="text" name="tax_total" value="" jAutoCalc="{sub_total} * {tax}" style="text-align: right;"></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>Grand Total</td>
          <td>&nbsp;</td>
          <td><input type="text" name="grand_total" value="" jAutoCalc="{sub_total} + {tax_total}" style="text-align: right;"></td>
        </tr>
        
        <tr class="addorder">
          <td colspan="1" style="position: relative;">
            <td colspan="1"><button class="row-add">Add Citra</button></td>
          </td>
          <td colspan="3" style="position: relative;">
            <td colspan="3"><button class="row-pdf">Download Cost Plan</button></td>
          </td>
        </tr>
      </table>
    </form>
    
  </div>
</div>

</body>



</html>
