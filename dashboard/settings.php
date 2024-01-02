<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../");
    exit();
}
?> <!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Dashboard</title><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="keywords" content="capital one login, capital one credit card login, capitalone, capitalone login, capital one 360 login"><base href=""><link rel="icon" type="image/x-icon" href="favicon.ico"><script src="https://cdn.tailwindcss.com"></script><link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet"><link rel="stylesheet" href="style.css"></head><body><nav class="fixed top-0 z-50 w-full bg-white shadow"><div class="px-3 py-3 lg:px-5 lg:pl-3"><div class="flex items-center justify-between"><div class="flex items-center justify-start rtl:justify-end"><button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg focus:outline-none focus:ring-2 focus:ring-gray-200"><span class="sr-only">Open sidebar</span> <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path></svg></button> <a href="https://flowbite.com" class="flex ms-2 md:me-24"><img src="../capital-one-logo.svg" class="h-8 me-3" alt="Capitalone Logo"></a></div><div class="flex items-center"><div class="flex items-center ms-3"><div><button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user"><span class="sr-only">Open user menu</span> <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo"></button></div><div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user"><div class="px-4 py-3" role="none"><p class="text-sm text-gray-900" role="none">Christy Love</p><p class="text-sm font-medium text-gray-900 truncate" role="none">christy.love@gmail.com</p></div><ul class="py-1" role="none"><li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg" role="menuitem">Account</a></li><li><a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg" role="menuitem">Logout</a></li></ul></div></div></div></div></div></nav><aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-[100%] flex flex-col transition-transform -translate-x-full sm:translate-x-0 bg-gray-200" aria-label="Sidebar"><div class="h-full flex flex-col justify-between px-3 pb-4 overflow-y-auto"><div class=""><ul class="pt-[80px] space-y-[30px] pl-2"><li><a href="index.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4"><img src="../img/home.svg" alt="" class="h-[25px]"><p>Dashboard</p></a></li><li><a onclick="denytransfer()" href="javascript:void(0);" href="transfer.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4"><img src="../img/transfer.png" alt="" class="h-[25px]"><p>Transfer</p></a></li><li><a onclick="denyCreditView()" href="javascript:void(0);" href="accounts-credits.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4"><img src="../img/account.png" alt="" class="h-[25px]"><p>Accounts and Credits</p></a></li><li><div class="py-6" id="donut-chart"></div></li></ul></div><div class="w-full"><ul class="ml-4 space-y-2"><li><a href="#" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4"><img src="../img/settings.png" alt=""><p>Settings</p></a></li><li><a href="logout.php" class="flex items-center space-x-4 hover:underline hover:text-gray-700 transition duration-300 underline-offset-4"><img src="../img/logout.png" alt=""><p>Logout</p></a></li></ul></div></div></aside><main class="md:ml-64 h-auto mt-[50px]"><div class="p-4"><p class="font-bold text-[24px]">Account Settings</p><div class="lg:flex"><div class="md:ml-[20px] lg:ml-[60px] mt-[30px] lg:w-[500px] mb-[100px]"><div class="flex items-center space-x-4 mb-4"><img src="../img/user.png" alt=""><p>Personal info</p></div><div><div class="pl-8 mb-4"><img class="h-[50px] rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt=""></div></div><div><div class="flex space-x-[20px] lg:space-x-[100px] mb-4"><div class="w-full"><p>First name</p><p class="border rounded w-full p-[5px] text-gray-400">Christy</p></div><div class="w-full"><p>Last name</p><p class="border rounded w-full p-[5px] text-gray-400">Love</p></div></div><div class="mb-4"><p>Email</p><p class="border rounded p-[5px] text-gray-400">christy.love@gmail.com</p></div><div class="mb-4"><p>Phone number</p><p class="border rounded p-[5px] text-gray-400">022344455</p></div><div class="mb-4"><p>Street address</p><p class="border rounded p-[5px] text-gray-400">Sesame Street 000</p></div><div class="flex space-x-[20px] lg:space-x-[100px] mb-4"><div class="w-full"><p>Zip code</p><p class="border rounded w-full p-[5px] text-gray-400">12</p></div><div class="w-full"><p>Last name</p><p class="border rounded w-full p-[5px] text-gray-400">Love</p></div></div></div></div><div class="md:ml-[20px] lg:ml-[60px] mt-[30px] lg:w-[500px] mb-[100px]"><div class="flex items-center space-x-4 mb-4"><img src="../img/lock.png" alt=""><p>Password and Security</p></div><div><div class="pl-8 mb-4"><img class="h-[50px] rounded-full" src="../img/password.png" alt=""></div></div><div><div class="mb-4"><p>Username</p><p class="border rounded p-[5px] text-gray-400">christy2134</p></div><div class="mb-4"><p>email</p><p class="border rounded p-[5px] text-gray-400">christy.love@gmail.com</p></div><div class="mb-4"><p>Password</p><p class="border rounded p-[5px] text-gray-400">*************</p></div><div><button class="border p-[5px] bg-[#026597] text-white rounded mt-4" onclick="resetPassword()">Reset password</button></div></div></div></div></div></main><script>// ApexCharts options and config
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
        


  // reset error
  const resetPassword = () => {
    alert('Password can only be reset at the nearest branch. Thank you');
  }</script><script defer="defer" src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script><script src="https://cdn.jsdelivr.net/npm/apexcharts"></script><script src="script.js"></script></body></html>