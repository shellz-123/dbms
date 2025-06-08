<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            
        }
        .main-container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            gap: 20px;
            padding: 20px;
        }
        .tabs {
            display: flex;
            background-color: #4ECDC4;
            border-radius: 8px 8px 0 0;
        }

        .tab {
            flex: 1;
            padding: 12px;
            text-align: center;
            color: white;
            cursor: pointer;
            border-right: 1px solid rgba(255,255,255,0.3);
        }

        .tab:last-child {
            border-right: none;
        }

        .tab.active {
            background-color: #44A08D;
             border-radius: 8px 8px 0 0
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            padding: 20px;
            background-color: white;
            border-radius: 0 0 8px 8px;
        }

        .movie-card {
            background-color: #f8f8f8;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .movie-card:hover {
            transform: translateY(-5px);
        }

        .movie-poster {
            width: 100%;
            height: 180px;
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
        }

        .movie-info {
            padding: 10px;
        }

        .movie-buttons {
            display: flex;
            gap: 5px;
            margin-bottom: 8px;
        }

        .btn-small {
            font-size: 10px;
            padding: 4px 8px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-buy {
            background-color: #FF6B35;
            color: white;
        }

       

        .movie-name {
            font-size: 12px;
            font-weight: bold;
            color: #333;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .movies-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .banner-section {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <main class="content-area">

            <div class="tabs">
                <div class="tab active">NOW SHOWING</div>
                <div class="tab">ABOUT US</div>
            </div>

            <div class="movies-grid">
                <div class="movie-card">
                    <div class="movie-poster">GO-GOD BALLERINA</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <a href="register.php" class="btn-small btn-buy">Book Now</a>
                        </div>
                        <div class="movie-name">GO-GOD BALLERINA</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">4DX GLADIATOR FINAL DESTINY</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">4DX GLADIATOR FINAL DESTINY</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">LEO A-GIANT LILO & STITCH</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">LEO A-GIANT LILO & STITCH</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">A-GIANT BALLERINA</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">A-GIANT BALLERINA</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">4D-UXX BALLERINA</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">4D-UXX BALLERINA</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">ALVARO DON'T SLEEP</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">ALVARO DON'T SLEEP</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">ALVARO FINAL DESTINY</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">ALVARO FINAL DESTINY</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">A-LUXE LILO & STITCH</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">A-LUXE LILO & STITCH</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">A-LUXE MISSION: (IMOC)</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">A-LUXE MISSION: (IMOC)</div>
                    </div>
                </div>

                <div class="movie-card">
                    <div class="movie-poster">ATMOS BALLERINA</div>
                    <div class="movie-info">
                        <div class="movie-buttons">
                            <button class="btn-small btn-buy">Book Now</button>
                        </div>
                        <div class="movie-name">ATMOS BALLERINA</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    

    <script>
        // Tab functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Movie card hover effects
        document.querySelectorAll('.movie-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Button interactions
        document.querySelectorAll('.btn, .btn-small').forEach(button => {
    button.addEventListener('click', function(e) {
        // Only prevent default if it's NOT an anchor tag
        if (this.tagName !== 'A') {
            e.preventDefault();
        }
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 100);
    });
});
    </script>
</body>
</html>