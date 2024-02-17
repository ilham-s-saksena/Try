<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nama Website</title>
    <link rel="icon" href="/favicon.png" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   <script src="https://cdn.tailwindcss.com"></script>
  </head>
<body>


<section class="flex">

<section>

<section class="bg-white dark:bg-gray-900 rounded-lg">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cek Ongkir - Domestik</h2>
      <form action="{{ route('cek-ongkir') }}" method="post">
        @csrf
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
              <label for="asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota Asal</label>
              <select id="asal" name="asal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Pilih Kota Asal</option>
                  @foreach($data['results'] as $city)
                  <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                  @endforeach
                </select>
            </div>
            
            <div class="w-full sm:col-span-2">
                  <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota Asal</label>
                  <select id="tujuan" name="tujuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option selected>Pilih Kota Tujuan</option>
                      @foreach($data['results'] as $city)
                      <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                      @endforeach
                    </select>
                </div>
                
                
                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Barang (Gram)</label>
                    <input type="number" name="berat" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="1200" required="">
                </div> 
                
                <div class="w-full">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Jasa Pengiriman</label>
              <select id="kurir" name="kurir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Jasa Pengiriman</option>
                    <option value="pos">POS</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                </select>
              </div>
              
          </div>
          <button type="submit" class="w-full text-center justify-center flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
              Cek Ongkir
          </button>

          @if(isset($ongkir))
          <div class="w-full text-center flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
          <div>
              <h1>Data Ongkir</h1>    
              <div class="w-full text-left">
                  <div>Kurir : {{ $ongkir['name'] }}</div>
                  <div>Service : {{ $ongkir['costs'][0]['service'] }}</div>
                  <div>Harga : Rp. {{ number_format($ongkir['costs'][0]['cost'][0]['value']) }}</div>
                  <div>Estimasi : {{ $ongkir['costs'][0]['cost'][0]['etd'] }} Hari</div>
                  <div>Catatan : {{ $ongkir['costs'][0]['cost'][0]['note'] }}</div>
                </div>
            </div>
        </div>
        @endif
      </form>
  </div>
</section>



</section>

<section class="flex-1"></section>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>