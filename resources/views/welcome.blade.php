<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel Website</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0px;
        }

        nav {
            background-color: #111827;
            color: #ffffff;
            padding: 18px 0;
        }
        
        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .menu {
            list-style: none;
            gap: 20px;
            display: flex;
        }

        .menu a {
            color: #ffffff;
            text-decoration: none;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 80px 0;
            gap: 30px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 24px;
            line-height: 1.7;
        }

        .btn {
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
        }

        .hero-image img {
            max-width: 100%;
            width: 500px;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
        }
        
        .card h3 {
            margin-bottom: 12px;
        }

        footer {
            background-color: #111827;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .menu {
                display: none;
            }
            
            .cards {
                grid-template-columns: 1fr;
            }
        }
</style>
</head>
<body>
    <nav>
        <div class="container nav-inner">
            <div class="logo">MyBrand</div>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <section class="hero">
            <div>
                <h1>Welcome to My Laravel Website</h1>
                <p>
                    saya sedang belajar laravel dan ini adalah project pertama saya. semoga bisa bermanfaat bagi orang lain.    
                </p>
                <button class="btn">Get Started</button>
            </div>
            <div class="hero-image">
                <img src="https://via.placeholder.com/500" alt="Hero Image">
            </div>
        </section>

        <section class="cards">
            <div class="card">
                <h3>Frontend</h3>
                <p>belajar layout, warna, spacing, dan desain tampilan sederhana</p>
            </div>
            <div class="card">
                <h3>Backend</h3>
                <p>belajar logic, database, API</p>
            </div>
            <div class="card">
                <h3>Project</h3>
                <p>belajar menerapkan konsep frontend dan backend dalam sebuah project real</p>
            </div>
        </section>

        <footer>
            &copy; 2024 My Laravel Website. All rights reserved.
        </footer>

    </main>
</body>
</html>