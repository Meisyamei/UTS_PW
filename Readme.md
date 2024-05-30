Meisya Margareta Yovita
20220801187

Data Fakultas

folder syntax menggunakan template src dari github djambred
langkaah pembuatan baackend

    Pada Terminal
    1. membuat container docker dengan docker-compose up -d --build
    2. masuk ke dalam container docker exec -t pemweb bash disini menggunakan pemweb debagai lokasi container
    3. compposer install
    4. setting .env dengan nama containeer 
    5. php artisasn key:generate
    6. Membuat model baru yaitu dosen, mahasiswa, dan data fakultas
    7. membuat controler untuk model nya DosenControler.php, MhsControler.php, DataControler.php
    8. Membuat file pada folder request dengan MassDestroyMhsRequest, UpdateMhsRequest,StoreMhsRequest. MassDestroyDosenRequest, UpdateDosenRequest, StoreDosenRequest. MassDestroyDataRequest, UpdateDataRequest, StoreDataRequest.
    9. buat folder baru di dalam view admin untuk dose, mahasiswa dan data fakultas
    10. meeemebuat file blade pada setiap menu yaitu edit.blade.php , create.blade.php , show.blade.php , index.blade.php
    11. php artisan migrate
    12. mengisi bagian yang ada dalam menu data, dosen dan mahasiswa.
    13. mengisi bagian model data, mhs, dan dosen
    14. mengisi bagian datacontroler, mhscontroler, dan dosencontroler
    15. mengaatur perizinan di permision seeder
    16. mengatur tampilan dashboard pada cruds.php 
    17. mengatur route pada web.php untuk dosen, mahasiswa, dan data fakultas
    18. pada terminal masuk ke container docker exec -it pemweb bash
    19. setelah masuk ke container php artisan migrate:fresh
    20. untuk akses localhost lakukan perintah php artisasn db:seed
    tampilan pemweb local host akan keluar dan menu untuk data fakultas, mahasiswa dan dosen berada di bagian frontend
    

