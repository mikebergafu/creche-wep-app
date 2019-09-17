$(document).ready(function() {
    var ur=window.location.href;
    var urSplit=ur.split('/');
    var obj;
    var id=urSplit[5];
    //alert(id);
    var date_received = document.getElementById('date_received');
    var account_no = document.getElementById('account_no');
    var account_name = document.getElementById('account_name');
    var receipt_no = document.getElementById("receipt_no");
    var current = document.getElementById("current");
    var arrears = document.getElementById("arrears");
    var bank = document.getElementById("bank");
    var cheque_no = document.getElementById("cheque_no");
    var search_key = document.getElementById("search_key");
    var amount = document.getElementById("amount");

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            var res_array = xhttp.responseText;
            obj = JSON.parse(res_array);
            date_received.value = obj.payment[0].date_received;
            account_no.value = obj.payment[0].cust_no;
            account_name.value = obj.payment[0].cust_name;
            receipt_no.value = obj.payment[0].receipt_no;
            current.value = obj.payment[0].current;
            arrears.value = obj.payment[0].arrears;
            pay_method.value = obj.payment[0].payment_type;

            if (document.getElementById("pay_method").value === "Cheque") {
                document.getElementById("ifCheque").style.display = "block";
            } else document.getElementById("ifCheque").style.display = "none";

            bank.value = obj.payment[0].bank;
            cheque_no.value = obj.payment[0].cheque_no;
            search_key.value = obj.payment[0].search_key;
            amount.value = obj.payment[0].amount;



        }
    };
    xhttp.open("GET", "http://196.61.32.236:4300/api/property/payment/"+id, true);
    xhttp.send();



});
