<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Manager Farm Dashboard
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Inter', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">
  <div class="flex h-screen">
   <!-- Sidebar -->
   <div class="w-64 bg-white shadow-md">
    <div class="p-6">
     <div class="flex items-center space-x-2">
      <i class="fas fa-seedling text-blue-500">
      </i>
      <span class="text-xl font-bold text-blue-500">
       Manager Farm
      </span>
     </div>
    </div>
    <nav class="mt-6">
     <a class="flex items-center p-4 text-blue-500 bg-blue-100 rounded-lg" href="#">
      <i class="fas fa-home mr-3">
      </i>
      <span>
       Dashboard
      </span>
     </a>
     <a class="flex items-center p-4 text-gray-600 hover:bg-gray-200 rounded-lg" href="#">
      <i class="fas fa-box mr-3">
      </i>
      <span>
       Stock
      </span>
     </a>
     <a class="flex items-center p-4 text-gray-600 hover:bg-gray-200 rounded-lg" href="#">
      <i class="fas fa-users mr-3">
      </i>
      <span>
       Users
      </span>
     </a>
     <a class="flex items-center p-4 text-gray-600 hover:bg-gray-200 rounded-lg" href="#">
      <i class="fas fa-plus mr-3">
      </i>
      <span>
       Add
      </span>
     </a>
     <a class="flex items-center p-4 text-gray-600 hover:bg-gray-200 rounded-lg" href="#">
      <i class="fas fa-file-alt mr-3">
      </i>
      <span>
       Reports
      </span>
     </a>
    </nav>
    <div class="absolute bottom-0 p-6">
     <a class="flex items-center text-blue-500" href="#">
      <i class="fas fa-sign-out-alt mr-2">
      </i>
      <span>
       Logout
      </span>
     </a>
    </div>
   </div>
   <!-- Main Content -->
   <div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
     <div class="relative">
      <input class="w-80 p-2 pl-10 border border-gray-300 rounded-lg" placeholder="Search" type="text"/>
      <i class="fas fa-search absolute left-3 top-3 text-gray-400">
      </i>
     </div>
     <div class="flex items-center space-x-4">
      <i class="fas fa-bell text-gray-400">
      </i>
      <div class="flex items-center space-x-2">
       <img alt="User avatar" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/X7DVyuqTwSZYPx8YHkEG1RMvQqz1Gg3nh2n7niTK3i8mZe5JA.jpg" width="40"/>
       <span class="text-gray-600">
        Admin
       </span>
      </div>
     </div>
    </div>
    <!-- Analytics -->
    <div class="grid grid-cols-4 gap-6 mb-6">
     <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center space-x-4">
       <i class="fas fa-chart-line text-blue-500 text-2xl">
       </i>
       <div>
        <p class="text-gray-600">
         Total Penerimaan Bulanan
        </p>
        <p class="text-2xl font-bold">
         89066 Ton
        </p>
       </div>
      </div>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center space-x-4">
       <i class="fas fa-chart-pie text-blue-500 text-2xl">
       </i>
       <div>
        <p class="text-gray-600">
         Total Pengeluaran Bulanan
        </p>
        <p class="text-2xl font-bold">
         9886 Ton
        </p>
       </div>
      </div>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center space-x-4">
       <i class="fas fa-warehouse text-blue-500 text-2xl">
       </i>
       <div>
        <p class="text-gray-600">
         Kapasitas Gudang Tersisa
        </p>
        <p class="text-2xl font-bold">
         650 Ton
        </p>
       </div>
      </div>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center space-x-4">
       <i class="fas fa-boxes text-blue-500 text-2xl">
       </i>
       <div>
        <p class="text-gray-600">
         Stok Dalam Gudang
        </p>
        <p class="text-2xl font-bold">
         1280 Ton
        </p>
       </div>
      </div>
     </div>
    </div>
    <!-- Charts and Recent Activity -->
    <div class="grid grid-cols-3 gap-6">
     <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-lg font-semibold mb-4">
       Laporan Barang
      </h2>
      <img alt="Line chart showing weekly report" height="300" src="https://storage.googleapis.com/a1aa/image/AazH9fOU0v0LECflksTiUp8a42ifmixONvSepqK9unw2ZmPPB.jpg" width="600"/>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-lg font-semibold mb-4">
       Kapasitas
      </h2>
      <div class="text-center">
       <p class="text-2xl font-bold">
        670 ton
       </p>
       <p class="text-red-500">
        1280 ton
       </p>
      </div>
      <img alt="Pie chart showing capacity distribution" height="200" src="https://storage.googleapis.com/a1aa/image/TBafmfmyMgn2JUNV5azChAlF3zcHVi4H1jcf1BqI6MF0MznnA.jpg" width="200"/>
     </div>
    </div>
    <!-- Recent History -->
    <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
     <h2 class="text-lg font-semibold mb-4">
      Riwayat Terbaru
     </h2>
     <table class="w-full text-left">
      <thead>
       <tr>
        <th class="pb-2">
         Item Name
        </th>
        <th class="pb-2">
         Qty
        </th>
        <th class="pb-2">
         Kualitas
        </th>
        <th class="pb-2">
         Asal/Tujuan
        </th>
        <th class="pb-2">
         Harga
        </th>
        <th class="pb-2">
         Keterangan
        </th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-t">
        <td class="py-2">
         Jagung 1
        </td>
        <td class="py-2">
         100
        </td>
        <td class="py-2">
         Tinggi
        </td>
        <td class="py-2">
         Bogor
        </td>
        <td class="py-2">
         Rp.2.000.000
        </td>
        <td class="py-2 text-green-500">
         Masuk
        </td>
       </tr>
       <tr class="border-t">
        <td class="py-2">
         Jagung 2
        </td>
        <td class="py-2">
         150
        </td>
        <td class="py-2">
         Sedang
        </td>
        <td class="py-2">
         Semarang
        </td>
        <td class="py-2">
         Rp.3.000.000
        </td>
        <td class="py-2 text-green-500">
         Masuk
        </td>
       </tr>
       <tr class="border-t">
        <td class="py-2">
         Jagung 3
        </td>
        <td class="py-2">
         200
        </td>
        <td class="py-2">
         Rendah
        </td>
        <td class="py-2">
         Kediri
        </td>
        <td class="py-2">
         Rp.4.000.000
        </td>
        <td class="py-2 text-red-500">
         Keluar
        </td>
       </tr>
      </tbody>
     </table>
     <div class="mt-4 text-right">
      <a class="text-blue-500" href="#">
       Pergi Ke Halaman Riwayat Transaksi →
      </a>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
