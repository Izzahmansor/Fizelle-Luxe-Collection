<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizelle Jewellery Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.min.js"></script>

    <!-- CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        *{
            margin:0; padding:0; box-sizing:border-box;
            font-family:"Poppins", sans-serif;
        }

        :root{
            --white:#ffffff;
            --black:#000000;
            --primary:#1C2A43;
            --secondary:#E6C765;
            --light-gray:#f6f6f6;
            --gray:#dcdcdc;
            --radius:14px;
            --card-shadow:0 4px 12px rgba(0,0,0,0.10);
            --max-width:1300px;
        }

        body{ background:#fafafa; }

        /* NAVBAR */
        header{
            position:fixed; width:100%; top:0; left:0; z-index:50;
            background:var(--primary);
            box-shadow:0 4px 10px rgba(0,0,0,0.15);
        }

        .navbar{
            max-width:var(--max-width);
            margin:auto;
            padding:16px 25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo-text{
            color:var(--white);
            font-size:1.7rem;
            font-weight:600;
        }

        .nav-menu{
            display:flex;
            gap:10px;
            list-style:none;
        }

        .nav-link{
            color:var(--white);
            padding:8px 18px;
            border-radius:18px;
            transition:0.3s;
        }

        .nav-link:hover{
            background:var(--secondary);
            color:var(--black);
        }

        #menu-open-button, #menu-close-button{
            font-size:1.6rem;
            color:white;
            background:none;
            border:none;
            cursor:pointer;
            display:none;
        }

        /* Mobile menu */
        @media(max-width:768px){
            .nav-menu{
                position:fixed;
                top:0; right:-100%;
                width:60%;
                height:100%;
                background:var(--primary);
                padding:80px 20px;
                flex-direction:column;
                transition:0.3s;
            }

            #menu-open-button{ display:block; }
            #menu-close-button{ 
                display:block; 
                margin-bottom:20px; 
                font-size:1.8rem;
            }
        }

        /* MAIN CONTENT */
        .main-content{
            max-width:var(--max-width);
            margin:auto;
            padding:130px 30px 50px;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:1.3rem;
        }

        @media(max-width:1024px){
            .cards{ grid-template-columns:repeat(2,1fr); }
        }
        @media(max-width:768px){
            .cards{ grid-template-columns:1fr; }
        }

        .card-single{
            background:white;
            padding:1.6rem;
            border-radius:var(--radius);
            box-shadow:var(--card-shadow);
            display:flex;
            justify-content:space-between;
            align-items:center;
            transition:0.25s;
        }
        .card-single:hover{
            transform:translateY(-5px);
        }

        .card-single h1{ font-size:1.8rem; color:var(--primary); }
        .card-single span{ color:#666; }

        /* TABLE */
        .recent-grid{ margin-top:3rem; }
        .card{ background:white; border-radius:var(--radius); box-shadow:var(--card-shadow); }
        .card-header{
            padding:1rem 1.2rem;
            background:var(--primary);
            color:white;
            font-size:1.2rem;
        
        border-radius:var(--radius) var(--radius) 0 0;
        }
        table{ width:100%; border-collapse:collapse; }
        thead{ background:var(--light-gray); }
        thead th{
            padding:12px;
            color:#555;
            font-size:0.95rem;
        }
        tbody td{
            padding:14px;
            text-align:center;
            border-bottom:1px solid #eee;
        }

        .status{ width:10px; height:10px; border-radius:50%; display:inline-block; margin-right:6px; }
        .pink{ background:#ea7aa7; }
        .orange{ background:#ffa447; }
        .green{ background:#5bc489; }

        /* CHART */
        .chart-section{
            margin-top:3rem;
            background:white;
            padding:30px;
            border-radius:var(--radius);
            box-shadow:var(--card-shadow);
        }

        .chart-section canvas{
            width:100% !important;
            height:380px !important;
        }

        /* FOOTER */
        footer{
            background:black;
            color:white;
            text-align:center;
            padding:40px 20px;
            margin-top:60px;
        }
        .social-link{
            font-size:1.4rem; margin:0 10px; color:white;
            transition:0.3s;
        }
        .social-link:hover{ color:var(--secondary); }
    </style>
</head>

<body>

<header>
    <nav class="navbar">
        <h2 class="logo-text">Fizelle Luxe Collection</h2>

        <ul class="nav-menu" id="mobileMenu">
            <button id="menu-close-button"><i class="fas fa-times"></i></button>

            <li><a href="#" class="nav-link">Dashboard</a></li>
            <li><a href="#chart" class="nav-link">Sales</a></li>
        </ul>

        <button id="menu-open-button"><i class="fas fa-bars"></i></button>
    </nav>
</header>

<div class="main-content">
    <!-- CARDS -->
    <div class="cards">
        <div class="card-single">
            <div><h1>54</h1><span>Customers</span></div>
            <i class="fas fa-users"></i>
        </div>
        <div class="card-single">
            <div><h1>79</h1><span>Projects</span></div>
            <i class="fas fa-clipboard"></i>
        </div>
        <div class="card-single">
            <div><h1>177</h1><span>Orders</span></div>
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-single">
            <div><h1>RM7,200</h1><span>Income</span></div>
            <i class="fas fa-wallet"></i>
        </div>
    </div>

    <!-- RECENT ORDERS -->
    <div class="recent-grid">
        <div class="card">
            <div class="card-header">Recent Orders</div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Details</th>
                            <th>Customer Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>524617</td>
                            <td>Worth of Life</td>
                            <td>mahshhd@gmail.com</td>
                            <td><span class="status pink"></span>Order Accepted</td>
                        </tr>
                        <tr>
                            <td>478516</td>
                            <td>Secret life of a Mermaid</td>
                            <td>dhjbtg@gmail.com</td>
                            <td><span class="status orange"></span>In Progress</td>
                        </tr>
                        <tr>
                            <td>416285</td>
                            <td>Mesmetos Diary</td>
                            <td>awgvhy@gmail.com</td>
                            <td><span class="status green"></span>Shipping</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CHART -->
    <section class="chart-section" id="chart">
        <h2>Sales Overview (January – Dec 2025)</h2>
        <canvas id="salesChart"></canvas>
    </section>


</div>

<footer>
    <p>@ 2025 Fizelle Luxe Collection</p>

    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>

    <p><a href="#" style="color:white;">Privacy Policy</a> | <a href="#" style="color:white;">Refund Policy</a></p>
</footer>

<!-- JS: Mobile Menu Toggle -->
<script>
    const menu = document.getElementById("mobileMenu");
    const openBtn = document.getElementById("menu-open-button");
    const closeBtn = document.getElementById("menu-close-button");

    openBtn.addEventListener("click", () => {
        menu.style.right = "0";
    });

    closeBtn.addEventListener("click", () => {
        menu.style.right = "-100%";
    });
</script>

<!-- JS: Chart -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById("salesChart");
    const ctx = canvas.getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Grace Bands", "Eternal Circle", "Elegenace Strands", "ELuxe Drops", "Soft Steps","Gentlemen;s Accents"],
            datasets: [{
                label: "Sales (RM)",
                data: [1200, 1800, 900, 1500, 700, 1100],
                backgroundColor: [
                    "#E6C765",
                    "#1C2A43",
                    "#d4a373",
                    "#b5838d",
                    "#6c757d"
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

});
</script>


</body>
</html>
