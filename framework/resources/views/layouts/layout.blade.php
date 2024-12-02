<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Dashboard
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 font-sans antialiased">
  <div class="flex h-screen">
   <!-- Sidebar -->
   <div class="w-64 bg-white shadow-md">
    <div class="p-6">
     <div class="flex items-center space-x-2">
      <i class="fas fa-leaf text-purple-600">
      </i>
      <span class="text-xl font-bold text-gray-800">
       Manager
       <span class="text-blue-500">
        Farm
       </span>
      </span>
     </div>
    </div>
    <nav class="mt-6">
     <a class="flex items-center p-2 text-gray-800 bg-gray-100 rounded-md" href="#">
      <i class="fas fa-home text-blue-500">
      </i>
      <span class="ml-3">
       Dashboard
      </span>
     </a>
     <a class="flex items-center p-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-md" href="#">
      <i class="fas fa-boxes">
      </i>
      <span class="ml-3">
       Stock
      </span>
     </a>
     <a class="flex items-center p-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-md" href="#">
      <i class="fas fa-users">
      </i>
      <span class="ml-3">
       Users
      </span>
     </a>
     <a class="flex items-center p-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-md" href="#">
      <i class="fas fa-plus">
      </i>
      <span class="ml-3">
       Add
      </span>
     </a>
     <a class="flex items-center p-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-md" href="#">
      <i class="fas fa-file-alt">
      </i>
      <span class="ml-3">
       Reports
      </span>
     </a>
    </nav>
    <div class="absolute bottom-0 w-full p-6">
     <a class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-md" href="#">
      <i class="fas fa-sign-out-alt text-blue-500">
      </i>
      <span class="ml-3">
       Logout
      </span>
     </a>
    </div>
   </div>
   <!-- Main Content -->
   <div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
     <div class="relative w-1/2">
      <input class="w-full p-2 pl-10 text-gray-600 bg-gray-200 rounded-md focus:outline-none" placeholder="Search" type="text"/>
      <i class="fas fa-search absolute left-3 top-3 text-gray-400">
      </i>
     </div>
     <div class="flex items-center space-x-4">
      <i class="fas fa-bell text-gray-600">
      </i>
      <i class="fas fa-cog text-gray-600">
      </i>
      <div class="flex items-center space-x-2">
       <img alt="User profile picture" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/wIMOoR4nSzrfUyBGmC01cY15ADuZAdsTOC0P4WGf3RGTAx2TA.jpg" width="40"/>
       <span class="text-gray-800">
        Admin
       </span>
      </div>
     </div>
    </div>
    <!-- Analytics -->
    <div class="mt-6">
     <h2 class="text-xl font-bold text-gray-800">
      Analytics
     </h2>
     <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2 lg:grid-cols-4">
      <div class="p-4 bg-white rounded-md shadow-md">
       <div class="flex items-center space-x-4">
        <i class="fas fa-download text-blue-500 text-2xl">
        </i>
        <div>
         <p class="text-gray-600">
          Total Penerimaan Bulanan
         </p>
         <p class="text-2xl font-bold text-gray-800">
          89066 Ton
         </p>
        </div>
       </div>
      </div>
      <div class="p-4 bg-white rounded-md shadow-md">
       <div class="flex items-center space-x-4">
        <i class="fas fa-upload text-blue-500 text-2xl">
        </i>
        <div>
         <p class="text-gray-600">
          Total Pengeluaran Bulanan
         </p>
         <p class="text-2xl font-bold text-gray-800">
          9886 Ton
         </p>
        </div>
       </div>
      </div>
      <div class="p-4 bg-white rounded-md shadow-md">
       <div class="flex items-center space-x-4">
        <i class="fas fa-warehouse text-blue-500 text-2xl">
        </i>
        <div>
         <p class="text-gray-600">
          Kapasitas Gudang Tersisa
         </p>
         <p class="text-2xl font-bold text-gray-800">
          650 Ton
         </p>
        </div>
       </div>
      </div>
      <div class="p-4 bg-white rounded-md shadow-md">
       <div class="flex items-center space-x-4">
        <i class="fas fa-box text-blue-500 text-2xl">
        </i>
        <div>
         <p class="text-gray-600">
          Stok Dalam Gudang
         </p>
         <p class="text-2xl font-bold text-gray-800">
          1280 Ton
         </p>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- Laporan Barang -->
    <div class="mt-6">
     <h2 class="text-xl font-bold text-gray-800">
      Laporan Barang
     </h2>
     <div class="grid grid-cols-1 gap-6 mt-4 lg:grid-cols-3">
      <div class="p-4 bg-white rounded-md shadow-md lg:col-span-2">
       <div class="flex items-center justify-between">
        <h3 class="text-gray-600">
         Day
        </h3>
        <h3 class="text-gray-600">
         Week
        </h3>
        <h3 class="text-gray-600">
         Month
        </h3>
        <h3 class="text-gray-600">
         Year
        </h3>
       </div>
       <img alt="Graph showing weekly report" class="w-full mt-4" height="300" src="https://storage.googleapis.com/a1aa/image/o9DlmpyqvYLiA91Fd1AHzk6m86e6EdTb9Tjh3xouVmTKgY7JA.jpg" width="600"/>
      </div>
      <div class="p-4 bg-white rounded-md shadow-md">
       <h3 class="text-gray-600">
        Kapasitas
       </h3>
       <p class="text-2xl font-bold text-gray-800">
        670 ton
       </p>
       <p class="text-red-500">
        1280 ton
       </p>
       <img alt="Pie chart showing capacity" class="w-full mt-4" height="200" src="https://storage.googleapis.com/a1aa/image/BHG2mjW2tkp9ONz9iCwoM4K2m4DBabxQHiEBJXPq0IUFQs9E.jpg" width="200"/>
      </div>
     </div>
    </div>
    <!-- Riwayat Terbaru -->
    <div class="mt-6">
     <h2 class="text-xl font-bold text-gray-800">
      Riwayat Terbaru
     </h2>
     <div class="p-4 mt-4 bg-white rounded-md shadow-md">
      <table class="w-full text-left">
       <thead>
        <tr>
         <th class="py-2">
          Item Name
         </th>
         <th class="py-2">
          Qty
         </th>
         <th class="py-2">
          Tanggal
         </th>
         <th class="py-2">
          Kualitas
         </th>
         <th class="py-2">
          Asal/Tujuan
         </th>
         <th class="py-2">
          Harga
         </th>
         <th class="py-2">
          Keterangan
         </th>
        </tr>
       </thead>
       <tbody>
        <tr>
         <td class="py-2">
          Jagung 1
         </td>
         <td class="py-2">
          100
         </td>
         <td class="py-2">
          26/08/2024
         </td>
         <td class="py-2">
          Tinggi
         </td>
         <td class="py-2">
          Bogor
         </td>
         <td class="py-2">
          Rp. 2.000.000
         </td>
         <td class="py-2 text-green-500">
          Masuk
         </td>
        </tr>
        <tr>
         <td class="py-2">
          Jagung 2
         </td>
         <td class="py-2">
          150
         </td>
         <td class="py-2">
          26/08/2024
         </td>
         <td class="py-2">
          Sedang
         </td>
         <td class="py-2">
          Semarang
         </td>
         <td class="py-2">
          Rp. 3.000.000
         </td>
         <td class="py-2 text-green-500">
          Masuk
         </td>
        </tr>
        <tr>
         <td class="py-2">
          Jagung 3
         </td>
         <td class="py-2">
          200
         </td>
         <td class="py-2">
          26/08/2024
         </td>
         <td class="py-2">
          Rendah
         </td>
         <td class="py-2">
          Kediri
         </td>
         <td class="py-2">
          Rp. 4.000.000
         </td>
         <td class="py-2 text-red-500">
          Keluar
         </td>
        </tr>
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
