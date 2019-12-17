<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <style>

            .heading{
                font-family: 'Noto Serif', serif;
                font-size: 40px;
            }

            .search{
            margin: auto;
            width: 43%;
            padding-left: 1em;
            padding-right: 1em;
            padding-bottom: 1em;
            border: 1px solid #CCC;
            }

            input[type=checkbox], input[type=radio] {
            width: auto;
            border: none;
            }

            ul {
            margin: 0;
            padding: 0;
            list-style: none;
            }


            .ProductSearch{
                font-size: 30px;
            }

            input[type=button]{

            }

            .submitForm{
                margin-left: 35%;
            }

            .similarItemsDiv{
                overflow: scroll;
                max-width: 50%;
                margin:auto;
            }

            .iframeDiv{
                margin: auto;
            }

            .iframe{
                margin: auto;
            }

            a:hover{
                color: #D0D0D0;

            }
            a{
                text-decoration: none;
                color: #000000;
            }

            caption{
                font-size: 35px;

            }

            iframe{
                display: block;
                overflow-y: hidden;
            }
            
        </style>
            
        </head>

        <body onload="getLocation()">
            <form action = "" name="myform" method="POST" id="search" class = "search">
                <div class ='heading' align = "center"  class = "ProductSearch"><i>Product Search</i></div>
                <hr>
                <b>Keyword</b> <input type="text" required name="Keyword" maxlength="255" size="10" value = "<?php if(isset($_POST['Keyword'])) {echo $_POST["Keyword"]; }?>" />
                <br>
                <br>

                <b>Category</b>
                <select name="category" value = "<?php if(isset($_POST["category"])) {echo ($_POST["category"]);} ?>">
                    <option value = "All Categories" <?php if (isset($_POST["category"]) && $_POST["category"] == 'All Categories') { echo "selected";} ?>>All Categories</option>
                    <option value = "Art" <?php if (isset($_POST["category"]) && $_POST["category"] == 'Art') { echo "selected";} ?>>Art</option>
                    <option value = "Baby"<?php if (isset($_POST["category"]) && $_POST["category"] == 'Baby') { echo "selected";} ?>>Baby</option>
                    <option value = "Books" <?php if (isset($_POST["category"]) && $_POST["category"] == 'Books') { echo "selected";} ?>>Books</option>
                    <option value = "Clothing, Shoes & Accessories" <?php if (isset($_POST["category"]) && $_POST["category"] == 'Clothing, Shoes & Accessories') { echo "selected";} ?>>Clothing, Shoes & Accessories</option>
                    <option value = "Computers/Tablets & Networking" <?php if (isset($_POST["category"]) && $_POST["category"] == 'Computers/Tablets & Networking') { echo "selected";} ?>>Computers/Tablets & Networking</option>
                    <option value = "Health & Beauty" <?php if (isset($_POST["category"]) && $_POST["category"] == 'Health & Beauty') { echo "selected";} ?>>Health & Beauty</option>
                    <option value = "Music"  <?php if (isset($_POST["category"]) && $_POST["category"] == 'Music') { echo "selected";} ?>>Music</option> 
                    <option value = "Video Game and Console"  <?php if (isset($_POST["category"]) && $_POST["category"] == 'Video Game and Console') { echo "selected";} ?>>Video Game and Console</option>                    
                </select>

                <br>
                <br>

                <b>Condition</b> 
                    <input type="checkbox" name ="condition[]" value = "New" id = "New" <?php if((isset($_POST["condition"][0]) && $_POST["condition"][0] == 'New') || (isset($_POST["condition"][1]) && $_POST["condition"][1] == 'New') || (isset($_POST["condition"][2]) && $_POST["condition"][2] == 'New')){echo("checked = 'checked'");}?>>New
                    <input type="checkbox" name ="condition[]" value = "Used" id = "Used" <?php if((isset($_POST["condition"][0]) && $_POST["condition"][0] == 'Used') || (isset($_POST["condition"][1]) && $_POST["condition"][1] == 'Used') || (isset($_POST["condition"][2]) && $_POST["condition"][2] == 'Used')){echo("checked = 'checked'");}?>>Used
                    <input type="checkbox" name ="condition[]" value = "Unspecified" id = "Unspecified" <?php if((isset($_POST["condition"][0]) && $_POST["condition"][0] == 'Unspecified') || (isset($_POST["condition"][1]) && $_POST["condition"][1] == 'Unspecified') || (isset($_POST["condition"][2]) && $_POST["condition"][2] == 'Unspecified')){echo("checked = 'checked'");}?>>Unspecified
                <br>
                <br>

                <b>Shipping Options</b>
                    <input type="checkbox" name ="shipping[]" value = "LocalPickup" id = "LocalPickup" <?php if((isset($_POST["shipping"][0]) && $_POST["shipping"][0] == 'LocalPickup') || (isset($_POST["shipping"][1]) && $_POST["shipping"][1] == 'LocalPickup')){echo("checked = 'checked'");}?>>Local Pickup
                    <input type="checkbox" name ="shipping[]" value = "FreeShipping" id = "FreeShipping" <?php if((isset($_POST["shipping"][0]) && $_POST["shipping"][0] == 'FreeShipping') || (isset($_POST["shipping"][1]) && $_POST["shipping"][1] == 'FreeShipping')){echo("checked = 'checked'");}?>>Free Shipping            
                <br>
                <br>

                <table>
                    <tr>
                        <td>
                            <input type="checkbox" name="NearBySearch" onChange = "nearBySearchChecked()" value = "YES" <?php if(isset($_POST["NearBySearch"])){echo("checked = 'checked'");} ?> ><b>Enable Nearby Search</b>&nbsp&nbsp&nbsp&nbsp
                            <input type = "text" name ="DistanceText" placeholder = "10" size = "10" value = "<?php if(isset($_POST["DistanceText"])) {echo $_POST["DistanceText"]; }?>">&nbsp
                            <label for = "Here" id = "milesFromLabel">miles from</label> 
                        </td>

                        <td>
                            <input type ="radio" name = "DistanceRadio" id = "hereRadio"  onclick="hereRadioChecked()" value = 'hereRadio' <?php if((isset($_POST["DistanceRadio"])) && $_POST["DistanceRadio"] == 'hereRadio'){echo("checked='checked'");}?>>
                            <label for = "DistanceRadio" id = "HereRadioLabel">Here</label>
                        </td>
                    </tr>
                            
                    <tr>
                        <td>
                        </td>

                        <td>
                            <input type ="radio" name = "DistanceRadio" id = "zipRadio"  onclick="zipRadioChecked()" value = 'zipRadio' <?php if((isset($_POST["DistanceRadio"])) && $_POST["DistanceRadio"] == 'zipRadio'){echo("checked='checked'");}?>>
                            <input type ="text" required name = "zipCodeText" placeholder = "zip code" value = "<?php if(isset($_POST["zipCodeText"])) {echo $_POST["zipCodeText"]; }?>">     

                        </td>

                    </tr>
                </table>

                <input type = "submit" value = "Search" name = "submitForm" class = "submitForm"> &nbsp 
                <input type = "button" value = "Clear" name = "Clear" onclick="clearAll()">
                <input type ="hidden" name = "hidden">
                <input type ='hidden' name = 'jsonOne'>
            </form>
            <br>
            <p id = "errorDiv" align="center"></p>
            <p id = "sellerMessage" align="center"> </p>
            <div id = 'iframeDiv' align= "center"></div>
            <p id = "similarItems" class = "similarItems" align="center"></p>
            <div id = "similarItemsDiv" class = "similarItemsDiv" align="center"></div>

            <script>
                // Displays the similar items table and hides the Seller Message if present
                function showSimilarItems(){
                    hideSellerMessage();
                     document.getElementById("similarItems").innerHTML = "<h5 style = 'color:#D3D3D3'>click to hide similar items<h5><a href = '' onclick = 'hideSimilarItems(); return false;' ><img src = 'http://csci571.com/hw/hw6/images/arrow_up.png' style='width:40px;height:20px;''>";

                     //similarItemsMessage = 'error';
                     if(similarItemsMessage == ""){
                        errorSecondPage('similarItemsDiv', 'No similar Item found.');
                     }

                     else if(similarItemsMessage == "error"){
                        errorSecondPage("similarItemsDiv", "Similar Items Access Error");
                     }

                     else{
                        document.getElementById("similarItemsDiv").innerHTML = similarItemsMessage;
                     }
                }
                                //Hides the similar items table
                function hideSimilarItems(){
                    document.getElementById("similarItems").innerHTML = "<h5 style = 'color:#D3D3D3'>click to show similar items<h5><a href = '' onclick = 'showSimilarItems(); return false;' ><img src = 'http://csci571.com/hw/hw6/images/arrow_down.png' style='width:40px;height:20px;''>"; 
                    document.getElementById("similarItemsDiv").innerHTML = '';
                    document.getElementById("similarItemsDiv").style.border = 'None';

                }

                //Shows the seller message and hides the similar items table if present
                function showSellerMessage(){
                    hideSimilarItems();
                    message = "<h5 style = 'color:#D3D3D3'>click to hide seller message<h5><a href = '' onclick = 'hideSellerMessage(); return false;' ><img src = 'http://csci571.com/hw/hw6/images/arrow_up.png' style='width:40px;height:20px;'><br>";
                    document.getElementById("sellerMessage").innerHTML = message;

                        if(desc == ''){
                            errorFirstPage("iframeDiv", "No Seller Message found.");
                        }
                        else{
                        frame = document.getElementById("iframeDiv");
                        text = "<p id = 'framing' align = 'center'><iframe display = 'block' frameBorder ='0' id = 'seller' width = '80%'></iframe>";
                        frame.innerHTML = text;

                        iframe = document.getElementById("seller");
                        iframedoc = iframe.document;
                        if(iframe.contentDocument)
                            iframedoc = iframe.contentDocument;
                        else if(iframe.contentWindow)
                            iframedoc = iframe.contentWindow.document;

                        if(iframedoc){
                            iframedoc.open();
                            iframedoc.writeln(desc);
                            document.getElementById("seller").height = iframe.contentDocument.body.scrollHeight + "px";
                            iframedoc.close();
                            
                        }
                        else{ 
                            errorFirstPage("iframeDiv", "No Seller Message found.");
                        }
                    }
                }

                //Hides the seller message 
                function hideSellerMessage(){

                    document.getElementById("sellerMessage").innerHTML ="<h5 style = 'color:#D3D3D3'>click to show seller message<h5><a href = '' onclick = 'showSellerMessage(); return false;' ><img src = 'http://csci571.com/hw/hw6/images/arrow_down.png' style='width:40px;height:20px;''>";
                    document.getElementById("iframeDiv").innerHTML = '';

                }    

                function linkclicked(link){
                    //document.getElementById("errorDiv").innerHTML = link;
                    document.getElementById("search").elements.namedItem("jsonOne").value = link;
                    //document.getElementById("jsonOne").value = link;
                    document.getElementById("search").submit();
                }

                //Called on loading the form and it gets the client's location by querying the ip-api 
                function getLocation(){
                    var URL = "http://ip-api.com/json"; 
                    jsonObj = loadJSON(URL);
                    
                    function loadJSON(url) {
                        if (window.XMLHttpRequest){
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest(); 
                        } 

                        else {// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
                        } 

                        xmlhttp.open("GET",url,false); // "synchronous" 
                        xmlhttp.send();
                        jsonObj= JSON.parse(xmlhttp.responseText);
                        return jsonObj; 

                    }

                    var zipCurrent = jsonObj.zip;

                    //document.getElementById("display").innerHTML = jsonObj.zip;
                    document.getElementById("search").elements.namedItem("submitForm").disabled = false;
                    document.getElementById("search").elements.namedItem("hidden").value = zipCurrent;  // Stores the client's location in a hidden type input in the form

                    if(document.getElementById("search").elements.namedItem("NearBySearch").checked == false){
                        document.getElementById("search").elements.namedItem("DistanceText").disabled = true;
                        document.getElementById("hereRadio").disabled = true;
                        document.getElementById("zipRadio").disabled = true;
                        document.getElementById("milesFromLabel").style.color = "#D3D3D3";
                        document.getElementById("HereRadioLabel").style.color = "#D3D3D3";
                        document.getElementById("hereRadio").checked = true;
                        document.getElementById("search").elements.namedItem("zipCodeText").disabled = true;
                    }
                    else{

                        document.getElementById("search").elements.namedItem("DistanceText").disabled = false;
                        document.getElementById("hereRadio").disabled = false;
                        document.getElementById("zipRadio").disabled = false;
                        document.getElementById("milesFromLabel").style.color = "#000000";
                        document.getElementById("HereRadioLabel").style.color = "#000000";

                        if(document.getElementById("hereRadio").checked == true){
                            document.getElementById("hereRadio").checked = true
                            document.getElementById("search").elements.namedItem("zipCodeText").disabled = true;
                        }
                        else{
                            document.getElementById("zipRadio").checked = true;
                            document.getElementById("search").elements.namedItem("zipCodeText").disabled = false;
                        }
                        
                        
                    }
                }

                //Used to clear all the fields in the form and the ouput if any
                function clearAll(){
                    document.getElementById("search").elements.namedItem("Keyword").value = "";
                    document.getElementById("search").elements.namedItem("category")[0].selected = "true";
                    document.getElementById("New").checked = false;
                    document.getElementById("Used").checked = false;
                    document.getElementById("Unspecified").checked = false;
                    document.getElementById("LocalPickup").checked = false;
                    document.getElementById("FreeShipping").checked = false;
                    document.getElementById("search").elements.namedItem("NearBySearch").checked = false;
                    document.getElementById("search").elements.namedItem("DistanceText").value = ""; 
                    document.getElementById("search").elements.namedItem("zipCodeText").value = "";
                    document.getElementById("hereRadio").checked = true;
                    document.getElementById("zipRadio").checked = false;

                    document.getElementById("errorDiv").innerHTML = '';
                    document.getElementById("errorDiv").style.color = '#FFFFFF';
                    document.getElementById("errorDiv").style.border = 'None';

                    document.getElementById("errorDiv").style.height = "0%";
                    document.getElementById("errorDiv").style.width = "0%";
                    document.getElementById("errorDiv").style.background = "#F0F0F0";

                    document.getElementById("sellerMessage").innerHTML = '';
                    document.getElementById("similarItems").innerHTML = '';


                    document.getElementById("similarItemsDiv").innerHTML = '';
                    document.getElementById("similarItemsDiv").style.color = '#FFFFFF';
                    document.getElementById("similarItemsDiv").style.border = 'None';

                    document.getElementById("search").elements.namedItem("DistanceText").disabled = true;
                    document.getElementById("hereRadio").disabled = true;
                    document.getElementById("zipRadio").disabled = true;
                    document.getElementById("milesFromLabel").style.color = "#D3D3D3";
                    document.getElementById("HereRadioLabel").style.color = "#D3D3D3";
                    document.getElementById("hereRadio").checked = true;
                    document.getElementById("search").elements.namedItem("zipCodeText").disabled = true;

                    document.getElementById("iframeDiv").innerHTML = '';
                    document.getElementById("similarItemsDiv").style.color = '#FFFFFF';
                    document.getElementById("similarItemsDiv").style.border = 'None';

                }

                //Executed when the zip radio is checked
                function zipRadioChecked(){
                    document.getElementById("search").elements.namedItem("zipCodeText").disabled = false;
                    //document.getElementById("search").elements.namedItem("zipCodeText").required = true;
                }

                //Executed when the here radio is checked
                function hereRadioChecked(){
                    document.getElementById("search").elements.namedItem("zipCodeText").disabled = true;
                }   

                //Executed when the nearBySearch radio is checked
                function nearBySearchChecked(){
                    if(document.getElementById("search").elements.namedItem("NearBySearch").checked == false){
                        document.getElementById("search").elements.namedItem("DistanceText").disabled = true;
                        document.getElementById("hereRadio").disabled = true;
                        document.getElementById("zipRadio").disabled = true;
                        document.getElementById("milesFromLabel").style.color = "#D3D3D3";
                        document.getElementById("HereRadioLabel").style.color = "#D3D3D3";
                        document.getElementById("hereRadio").checked = true;
                        document.getElementById("search").elements.namedItem("zipCodeText").disabled = true;

                    }

                    else{
                        document.getElementById("search").elements.namedItem("DistanceText").disabled = false;
                        document.getElementById("hereRadio").disabled = false;
                        document.getElementById("zipRadio").disabled = false;
                        document.getElementById("milesFromLabel").style.color = "#000000";
                        document.getElementById("HereRadioLabel").style.color = "#000000";
                        //document.getElementById("search").elements.namedItem("zipCodeText").disabled = false;
                        hereRadioChecked();
                    }
                }

                function findingAPI(jsonPHP){

                    var json = jsonPHP;
                    json_obj = JSON.parse(json);

                    //Constructing the search results table

                    html_text="<html><head><title></title></head><body>";
                    html_text+="<table border='1' cellpadding ='0' cellspacing='0 style='border-collapse:collapse'>";
                    html_text+="<tbody>";
                    html_text+="<tr>"; 
                    html_text+="<th>Index</th><th>Photo</th><th>Name</th><th>Price</th><th>Zip code</th><th>Condition</th><th>Shipping Option</th></tr>";

                    if(json_obj.hasOwnProperty("findItemsAdvancedResponse") && json_obj.findItemsAdvancedResponse[0].hasOwnProperty("searchResult") && json_obj.findItemsAdvancedResponse[0].searchResult[0].hasOwnProperty("item") ){

                        items = json_obj.findItemsAdvancedResponse[0].searchResult[0].item;


                        for(var i=0; i<items.length; i++){
                            link = items[i].itemId;
                            //Name
                            if(!items[i].hasOwnProperty("title")){
                                name = "N/A";
                            }
                            else{
                                name = items[i].title;          
                            }

                            //Photo
                            if(!items[i].hasOwnProperty("galleryURL")){
                                photo = "N/A";
                            }
                            else{
                                photo = items[i].galleryURL;            
                            }
                            
                            //Price
                            if(!items[i].hasOwnProperty("sellingStatus")){
                                price = "N/A";
                            }
                            else if (!items[i].sellingStatus[0].hasOwnProperty("currentPrice")){
                                price = "N/A";

                            }
                            else if (!items[i].sellingStatus[0].currentPrice[0].hasOwnProperty("__value__")){
                                price = "N/A";
                            } 
                                
                            else{
                                price = items[i].sellingStatus[0].currentPrice[0].__value__;  

                            }

                            //Zip
                            if(!items[i].hasOwnProperty("postalCode")){
                                zip = "N/A";
                            }
                            else{
                                zip = items[i].postalCode;          
                            }

                            //Condition
                            if(!items[i].hasOwnProperty("condition")){
                                condition = "N/A";
                            } 
                            else if (!items[i].condition[0].hasOwnProperty("conditionDisplayName")){
                                condition = "N/A";
                            }     
                            else{
                                condition = items[i].condition[0].conditionDisplayName;  
                                if(condition == 'New'){
                                    condition = "Brand " + condition;
                                }       
                                if(condition == 'Used'){
                                    condition = 'Pre Owned';
                                }
                            }

                            //Shipping
                            if(!items[i].hasOwnProperty("shippingInfo") )
                            {
                                shipping = "N/A";

                            }
                            else if(!items[i].shippingInfo[0].hasOwnProperty("shippingServiceCost"))
                            {
                               shipping="N/A";
                            }
                            else{
                                var number = /\d*\.?\d*/;
                                shipping = items[i].shippingInfo[0].shippingServiceCost[0].__value__
                                if(shipping == 0.0){
                                    shipping = "Free Shipping";
                                }

                                else if(number.test(shipping)){
                                    shipping = "$" + shipping;
                                }    
                                else{
                                shipping = items[i].shippingInfo[0].shippingServiceCost[0].__value__;   
                                }       
                            } 
                 
                            index = i + 1;
                            html_text+= "<tr><td> " +  index + "</td>";
                            html_text+="<td><img src='"+ photo + "'></td>";   
                            html_text+="<td><a href='' onclick='linkclicked(" + link +  "); return false'>" + name + "</a></td>";

                            html_text+="<td>$" + price + "</td>";
                            html_text+="<td>" + zip + "</td>";
                            html_text+="<td>" + condition + "</td>";
                            html_text+="<td>" + shipping + "</td></tr>";
                        }
                        
                        document.getElementById("errorDiv").innerHTML = html_text;
                    }//end of if
                    else{
                        errorFirstPage("errorDiv", "No Records has been found");
                    }
                }

                // Executed if the POST request is made and the user clicks on one of the items from the search results table
                function detailsAPI(jsonDetails, jsonMerc){
                    var json_oTwo = jsonDetails;
                    var json_objTwo = JSON.parse(json_oTwo);
                    var json_oMerc = jsonMerc;
                    var json_objMerc = JSON.parse(json_oMerc);
                    

                    //Check if there is a problem with the json returned 
                    if((json_objTwo.hasOwnProperty("ack") && json_obj.ack == 'Failure') || (json_objTwo.hasOwnProperty("Errors"))) {
                        errorFirstPage("errorDiv", "Invalid Item Detail Requested");
                    }
                    else{
                        // Constructing the table for the details of the product
                        html_text="<html><head><title></title></head><body>";
                        html_text+="<table width = '50%' id = 'tableTwo' border='1'cellpadding ='0' cellspacing='0 style='border-collapse:collapse'><caption ><b>Item Details</b></caption>";
                        html_text+="<tbody>";
                        html_text+="<tr>"; 
                        html_text+="<td><b>&nbsp&nbspPhoto</b></td>";

                        item = json_objTwo.Item;

                        if(!(item.hasOwnProperty("Description")) && (item.Description == '' || itemDescription == null)){
                            desc = '';
                        }
                        else{
                           desc = item.Description; 
                        }

                        //Picture
                        if((!item.hasOwnProperty("PictureURL")) || item.PictureURL[0] == ""){
                            photo = "";
                        }
                        else{
                            photo = item.PictureURL[0];          
                        }

                        //Title
                        if((!item.hasOwnProperty("Title")) || item.Title == ""){
                            title = "";
                        }
                        else{
                            title = item.Title;         
                        }

                        //Subtitle
                        if((!item.hasOwnProperty("Subtitle")) || item.Subtitle == ""){
                            subtitle = "";
                        }
                        else{
                            subtitle = item.Subtitle;           
                        }

                        //Current Price
                        if(!item.hasOwnProperty("CurrentPrice")){
                            price = "";
                        } 
                        else if (!item.CurrentPrice.hasOwnProperty("Value")){
                            price = "";
                        }
                            
                        else{
                            price = item.CurrentPrice.Value;         
                        }

                        if((!item.hasOwnProperty("PostalCode")) || item.PostalCode == ""){
                            zip = '';
                        }
                        else{
                            zip = item.PostalCode;        
                        }

                        if((!item.hasOwnProperty("Location")) || item.Location == ""){
                                loc = '';
                            }
                        else{
                            loc = item.Location;       
                        }

                        //returns
                        if(!item.hasOwnProperty("ReturnPolicy")){
                            ret = '';
                        } 
                        else if(!item.ReturnPolicy.hasOwnProperty("ReturnsAccepted")){
                            ret = '';
                        }
                        else{
                            ret = item.ReturnPolicy.ReturnsAccepted;       
                        }
                        
                        if(ret == 'Returns Accepted'){
                            if(item.ReturnPolicy.hasOwnProperty("ReturnsWithin")){
                                returnPolicy = 'Returns Accepted within ' + item.ReturnPolicy.ReturnsWithin ;
                            }
                            else{
                                returnPolicy = 'Returns Accepted';
                             }
                            }
                        else{
                                returnPolicy = 'Returns not Accepted';
                        }

                        //nameValueList
                        if(!item.hasOwnProperty("ItemSpecifics")){
                            nameValueList = "";
                        } 
                        else if (!item.ItemSpecifics.hasOwnProperty("NameValueList")){
                            nameValueList = "";
                        }
                        else{
                            nameValueList = item.ItemSpecifics.NameValueList;       
                        }

                        //seller
                        if(!item.hasOwnProperty("Seller")){
                            seller = "";
                        } 
                        else if (!item.Seller.hasOwnProperty("UserID")){
                            seller = "";
                        }
                        else{
                            seller = item.Seller.UserID;       
                        }

                        if(photo != ''){html_text+="<td>&nbsp&nbsp<img style='width:230px;height:180px;' src='"+ photo + "'></td></tr>";}
                        if(title != ''){html_text+="<tr><td><b>&nbsp&nbspTitle<b></td><td>&nbsp&nbsp" + title + "</td></tr>";}
                        if(subtitle != ''){html_text+="<tr><td><b>&nbsp&nbspSubtitle<b></td><td>&nbsp&nbsp" + subtitle + "</td></tr>";}
                        if(price != ''){html_text+="<tr><td><b>&nbsp&nbspPrice<b></td><td>&nbsp&nbsp" + price + " " + "USD </td></tr>";} 
                        if(loc != '' || zip != ''){html_text+="<tr><td><b>&nbsp&nbspPostal<b></td><td>&nbsp&nbsp" + loc + "," + zip + "</td></tr>";}
                        if(seller != ''){html_text+="<tr><td><b>&nbsp&nbspSeller<b></td><td>&nbsp&nbsp" + seller + "</td></tr>";}
                        if(returnPolicy != ''){html_text+="<tr><td><b>&nbsp&nbspReturn Policy(US)<b></td><td>&nbsp&nbsp" + returnPolicy + "</td></tr>";}
                    
                        for(var i = 0; i < nameValueList.length; i++){
                            nam = nameValueList[i].Name;
                            val = nameValueList[i].Value[0];
                            html_text+="<tr><td><b>&nbsp&nbsp" + nam + "<b></td><td>&nbsp&nbsp" + val + "</td></tr>";
                        }
                        if(nameValueList.length == 0){
                            html_text+="<tr><td><b>No Detail Info from Seller<b></td><td bgcolor='#d5d5d5'</td></tr>" 
                        }
                    }

                    //Constructing the table for displaying similar items incase the client requests for it 
                    if(json_objMerc.hasOwnProperty("Errors") || json_objMerc.hasOwnProperty("errorMessage")){
                        similarItemsMessage = "error";
                    }

                    else if(json_objMerc.hasOwnProperty("getSimilarItemsResponse") && json_objMerc.getSimilarItemsResponse.hasOwnProperty("itemRecommendations") && json_objMerc.getSimilarItemsResponse.itemRecommendations.hasOwnProperty("item") && json_objMerc.getSimilarItemsResponse.itemRecommendations.item.length > 0){
                        similarItemsMessage = "<html><head><title></title></head><body>";
                        similarItemsMessage +="<table border='1'cellpadding ='0' cellspacing='0 style='border-collapse:collapse' rules = 'none'>";
                        similarItemsMessage +="<tr>"; 


                        items = json_objMerc.getSimilarItemsResponse.itemRecommendations.item;

                            for(var i=0; i<items.length; i++){
                            item = items[i];

                                if((!item.hasOwnProperty("imageURL")) || item.imageURL == ""){
                                    photo = '';
                                }
                                else{
                                    photo = item.imageURL;          
                                }
                                similarItemsMessage +="<td><img src='"+ photo + "'></td>";
                            }
                            similarItemsMessage +="</tr><tr>";

                            for(var i=0; i<items.length; i++){
                                item = items[i];

                                if((!item.hasOwnProperty("title")) || item.title == ""){
                                    title = '';
                                }
                                else{
                                    title = item.title;         
                                }

                                link = item.itemId;

                                similarItemsMessage +="<td><a href='' id = 'similarLink' onclick='linkclicked(" + link +  "); return false'>"+ title + "</a></td>"; 
                            }  

                            similarItemsMessage +="</tr><tr>";   

                            for(var i=0; i<items.length; i++){
                                item = items[i];

                                if(!item.hasOwnProperty("buyItNowPrice")){
                                    price = '';
                                }
                                else if (!item.buyItNowPrice.hasOwnProperty("__value__")){
                                    price = '';
                                }
                                else{
                                    price = item.buyItNowPrice.__value__;        
                                }
                                 similarItemsMessage +="<td><b>$" + price + "</b></td>";                                    
                            }

                            similarItemsMessage +="</tr></table>";                                                
                    }
                                                
                    else{
                         similarItemsMessage = "";
                    }

                        document.getElementById("errorDiv").innerHTML = html_text;

                        document.getElementById("sellerMessage").innerHTML = "<h5 style = 'color:#D3D3D3'>click to show seller message<h5><a href = '' onclick = 'showSellerMessage(); return false;' ><img src = 'http://csci571.com/hw/hw6/images/arrow_down.png' style='width:40px;height:20px;''>";

                        document.getElementById("similarItems").innerHTML = "<h5 style = 'color:#D3D3D3'>click to show similar items<h5><a href = '' onclick = 'showSimilarItems(); return false;' ><img src = 'http://csci571.com/hw/hw6/images/arrow_down.png' style='width:40px;height:20px;''>";

                }

                function errorSecondPage(div, message){
                    document.getElementById(div).innerHTML = message;
                    document.getElementById(div).style.height = "2%";
                    document.getElementById(div).style.width = "50%";
                    document.getElementById(div).style.margin = "auto";
                    document.getElementById(div).style.alignContent= "center";
                    document.getElementById(div).style.textAlign="center";
                    document.getElementById(div).style.border="2px double #CCC";
                }

                function errorFirstPage(div, message){
                    document.getElementById(div).innerHTML = message;
                    document.getElementById(div).style.height = "10%";
                    document.getElementById(div).style.width = "50%";
                    document.getElementById(div).style.background = "#F0F0F0";
                    document.getElementById(div).style.margin = "auto";
                    document.getElementById(div).style.alignContent= "center";
                    document.getElementById(div).style.textAlign="center";
                    document.getElementById(div).style.border="1px solid #CCC";
                }

            </script>


            <?php 
            //Executed when a POST request is made to the server
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST["submitForm"])){ // executed when the submit button is pressed in the form 
                        if(isset($_POST["zipCodeText"]) && !(preg_match('/^[0-9]{5}$/', $_POST["zipCodeText"]))){
                               /* $error = "<br><div id = \"newdiv\" style = \"text-align: center;font-size: 15px; width: 700px; height: 15px; border: 1.5px solid #D3D3D3; margin-left: 23%\">";
                                echo $error;*/
            ?>
                                <script>
                                    errorFirstPage("errorDiv", "Invalid ZipCode" );
                                </script>
            <?                    
                            }
                        else{

                            $keyword =  $_POST["Keyword"];
                            $keyword = preg_replace('/\s+/', '+', $keyword); //Accepting multiple keywords seperated by spaces
                            //print_r($_POST);
                            //echo($keyword); 
                            $here = "false";
                            $zip = "false";
                            $distance = 10;
                            $distanceMethod = "hereRadio";
                            $appid = 'SuyashSa-ssardarH-PRD-e16e2f5cf-a5b96bb9'; 
                            $zipCode = '';
                            //echo(isset($_POST['shipping'][1]));

                            if(array_key_exists("NearBySearch", $_POST)){
                                $nearByCheck =  $_POST["NearBySearch"];
                            }
                            if(array_key_exists("DistanceText", $_POST)){
                                if($_POST["DistanceText"] != ''){
                                    $distance =  $_POST["DistanceText"];
                                }
                                
                            }
                            if(array_key_exists("DistanceRadio", $_POST)){
                                $distanceMethod =  $_POST["DistanceRadio"];
                            }

                            if(isset($_POST["NearBySearch"])){
                                if($distanceMethod == 'hereRadio'){
                                    $zipCode = $_POST["hidden"];
                                }
                                else{
                                    if(array_key_exists("zipCodeText", $_POST)){

                                        $zipCode =  $_POST["zipCodeText"];

                                        
                                    }
                                }
                        }

                        // Sample call to the ebay Finding API
                        /*http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=SuyashSa-ssardarH-PRD-e16e2f5cf-a5b96bb9&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&GLOBAL-ID=EBAY-US&keywords=iphone&buyerPostalCode=90007&paginationInput.entriesPerPage=20&itemFilter(0).name=MaxDistance&itemFilter(0).value=10&itemFilter(1).name=HideDuplicateItems&itemFilter(1).value=true&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=true&itemFilter(3).name=FreeShippingOnly&itemFilter(3).value=false&itemFilter(4).name=Condition&itemFilter(4).value(0)=New*/

                        //Constructing the call to ebay Finding API
                        $apicall = "http://svcs.ebay.com/services/search/FindingService/v1?";
                        $apicall .= "OPERATION-NAME=findItemsAdvanced";
                        $apicall .= "&SERVICE-VERSION=1.0.0";
                        $apicall .= "&SECURITY-APPNAME=$appid";
                        $apicall .= "&RESPONSE-DATA-FORMAT=JSON";
                        $apicall .= "&REST-PAYLOAD";
                        $apicall .= "&GLOBAL-ID=EBAY-US";
                        $apicall .= "&keywords=$keyword";
                        $apicall .= "&paginationInput.entriesPerPage=20";

                        if($zipCode != ''){
                            $apicall .= "&buyerPostalCode=$zipCode";
                            $apicall .= "&itemFilter(0).name=HideDuplicateItems&itemFilter(0).value=true";
                            $apicall .= "&itemFilter(1).name=MaxDistance&itemFilter(1).value=$distance"; 
                            $i = 2;
                        }
                        else{
                            $apicall .= "&itemFilter(0).name=HideDuplicateItems&itemFilter(0).value=true";
                            $i = 1;
                        }
                        

                        if(!empty($_POST["shipping"]))
                        {
                            foreach ($_POST["shipping"] as $ship) {
                                    if($ship == 'LocalPickup'){
                                        $apicall .= "&itemFilter($i).name=LocalPickupOnly&itemFilter($i).value=true";
                                        $i = $i + 1;
                                    }
                                    if($ship == 'FreeShipping'){
                                        $apicall .= "&itemFilter($i).name=FreeShippingOnly&itemFilter($i).value=true";
                                        $i = $i + 1;
                                    }
                            }
                        }
                        
                        if(!empty($_POST["condition"]))
                        {       $j = 1;
                                foreach ($_POST["condition"] as $con) {
                                    if($j == 1){
                                        $apicall .= "&itemFilter($i).name=Condition&itemFilter($i).value($j)=$con";
                                        $j = $j + 1;
                                    }
                                    else {
                                        $apicall .= "&itemFilter($i).value($j)=$con";
                                        $j = $j + 1;
                                    }
                                }
                        }


                        if(array_key_exists("category", $_POST)){
                            $category =  $_POST["category"];
                            if($category != 'All Categories'){
                                if($category == 'Art'){ $apicall .= "&categoryId=550"; }
                                if($category == 'Baby'){ $apicall .= "&categoryId=2984"; }
                                if($category == 'Books'){ $apicall .= "&categoryId=267"; }
                                if($category == 'Clothing, Shoes & Accessories'){ $apicall .= "&categoryId=11450"; }
                                if($category == 'Computers/Tablets & Networking'){ $apicall .= "&categoryId=58058"; }
                                if($category == 'Health & Beauty'){ $apicall .= "&categoryId=26395"; }
                                if($category == 'Music'){ $apicall .= "&categoryId=11233"; }
                                if($category == 'Video Game and Console'){ $apicall .= "&categoryId=1249"; }
                                
                            }
                        }
                        //echo ($apicall);
                        $resp =  file_get_contents($apicall); // Actual call to the ebay Finding API
                        $json_ = json_encode($resp);   
                        ?>
                        <script type="text/javascript">findingAPI(<?php print $json_?>)</script>
                        <?
                    }   

                }

            }

            //Executed when a POST request is made to the server
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["jsonOne"]) && $_POST["jsonOne"] != ''){ // Executed when a POST request is made and it contains a non empty field for 'jsonOne'(which is the item ID)
                    $itemID = $_POST["jsonOne"];

                    //$itemID = '252822643970';
                    $keyword =  $_POST["Keyword"];

                    //Constructing the api call to the ebay shopping API
                    $appid = 'SuyashSa-ssardarH-PRD-e16e2f5cf-a5b96bb9';  

                    $apicallTwo = "http://open.api.ebay.com/shopping?";
                    $apicallTwo .= "callname=GetSingleItem";
                    $apicallTwo .= "&responseencoding=JSON";
                    $apicallTwo .= "&appid=$appid";
                    $apicallTwo .= "&siteid=0";
                    $apicallTwo .= "&version=967";
                    $apicallTwo .= "&ItemID=$itemID";
                    $apicallTwo .= "&IncludeSelector=Description,Details,ItemSpecifics";

                    $call =  file_get_contents($apicallTwo); // Actual call to the ebay shopping api
                    $jsonTwo = json_encode($call);

                    //Constructing the call to the ebay Merchandising API
                    $apicallMerc = "http://svcs.ebay.com/MerchandisingService?";
                    $apicallMerc .= "OPERATION-NAME=getSimilarItems";
                    $apicallMerc .= "&SERVICE-NAME=MerchandisingService";
                    $apicallMerc .= "&SERVICE-VERSION=1.1.0";
                    $apicallMerc .= "&CONSUMER-ID=$appid";
                    $apicallMerc .= "&RESPONSE-DATA-FORMAT=JSON";
                    $apicallMerc .= "&REST-PAYLOAD";
                    $apicallMerc .= "&itemId=$itemID";
                    $apicallMerc .= "&maxResults=8";

                    $respMerc =  file_get_contents($apicallMerc); // Actual call to the ebay Merchandising API
                    $jsonMerc = json_encode($respMerc);

                    ?><script type="text/javascript">detailsAPI(<?php print $jsonTwo ?>, <?php print $jsonMerc ?>)</script>
                    <?
                }
            }

            ?>
    </body>
</html>