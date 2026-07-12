<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
    <style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100
}

*,
::before,
::after {
    box-sizing: border-box
}

body {
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s;
    overflow-x: hidden;
}

a {
    text-decoration: none
}

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: white;
    z-index: var(--z-fixed);
    transition: .5s
}

.header_toggle {
    color: gray;
    font-size: 1.5rem;
    cursor: pointer
}

.search{
    width: 90%;
    padding: 1rem;
}

#searchInput{
    width: 75%;
    outline: none;
    border: none;
    border-radius: 0.5rem;
    height: 1.5rem;
    padding:1rem 0.5rem;
    background-color: white;
}

.searchIcons{
    color: gray;
    margin-right: -0.2rem;
    background-color: white;
}

#bellIcon{
    margin-left: 1rem;
}

#name{
    font-size: 0.8rem;
    margin-left: 2.5rem;
    margin-right: 0.5rem;
}

.bi-chevron-down{
    width: 0.6rem;
}


.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden;
}

.header_img img {
    width: 40px
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: white;
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed);
    border-right: 1px solid #dedede;
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem
}

.nav_logo {
    margin-bottom: 2rem;
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: gray;
}

.nav_logo-name {
    color: black;
    font-weight: 700
}

.nav_link {
    position: relative;
    color: gray;
    margin-bottom: 1.5rem;
    transition: .3s
}

.nav_link:hover {
    color: gray;
}

.nav_icon {
    font-size: 1.25rem
}

.show {
    left: 0
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem)
}

.active {
    color: gray;
}

.active::before {
    content: '';
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color:white;
}

main{
    margin-top: 5.75rem !important;
}

.containerr{
    margin:2rem 0 0 0;
    padding: 0;
    display: flex;
    width: 100% !important;
    justify-content: space-between;
    flex-wrap: wrap;
}

.containerr>div{
    width: 21rem;
    background-color: #f5f5f5;
    border-radius: 0.5rem;
    display: flex;
    flex-direction: column;
    padding: 0.5rem 1rem;
    gap: 1rem;
    min-height: 70vh;
    margin: 0 1rem 2rem 0;
}


@media (max-width: 1241px) {
    #searchInput{
        width: 45%;
    }
}

@media (max-width: 944px) {
    .containerr{
        justify-content: center;
    }
}
@media (max-width: 768px){
    #name , #markdown{
        display: none;
    }
    #bellIcon{
        margin-right: 1rem;
    }
}

@media(max-width: 700px) {
    .containerr>div{
        margin-right: 0;
    }
}

@media (max-width: 380px) {
    input::placeholder{
        color: white;
    }
}

@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem)
    }
    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
    }
    .header_img {
        width: 40px;
        height: 40px
    }

    .header_img img {
        width: 45px
    }
    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0
    }
    .show1 {
        width: calc(var(--nav-width) + 156px)
    }
    .body-pd {
        padding-left: calc(var(--nav-width) + 188px)
    }


}

         .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 15px; 
        }
        .view-button-cell {
            text-align: center;
        }
       
        
    </style>
    <title>Packaging</title>
</head>
<body id="body-pd">
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <main>
        <h4>Packaging</h4>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Order No</th>
                    <th>Particulars</th>
<th></th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch_order_details.php'; echo $order_details;?>
            </tbody>
        </table>

        <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="orderDetailsModalLabel">Order Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="orderDetailsContent"></div>
                    <div class="modal-footer">
                        <form id="proceedForm" action="update_sales_no.php" method="post">
                            <input type="hidden" id="selectedOrderId" name="selected_order">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function showViewButton(radio) {
            document.querySelectorAll('.view-button-cell').forEach(cell => {
                cell.innerHTML = '';
            });

            const selectedRow = radio.closest('tr');
            const viewButtonCell = selectedRow.querySelector('.view-button-cell');
            const viewButton = document.createElement('button');
            viewButton.textContent = 'View';
            viewButton.classList.add('btn', 'btn-secondary');
            viewButton.onclick = function() {
                const orderId = radio.value;
                fetchOrderDetails(orderId);
            };

            viewButtonCell.appendChild(viewButton);
        }

        function fetchOrderDetails(orderId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'fetch_order_details.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('orderDetailsContent').innerHTML = xhr.responseText;
                    document.getElementById('selectedOrderId').value = orderId;
                    const orderDetailsModal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
                    orderDetailsModal.show();
                }
            };
            xhr.send('order_id=' + orderId);
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)

// Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
// show navbar
            nav.classList.toggle('show1')
// change icon
            toggle.classList.toggle('bx-x')
// add padding to body
            bodypd.classList.toggle('body-pd')
// add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

});


// script.js

// Function to start scanning


    </script>
</body>
</html>