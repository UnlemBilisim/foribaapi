<?php
spl_autoload_register(function($class){

    // top-level namespace
    $prefix = 'Bulut\\';

    // namespace için ana dizin
    $base_dir = __DIR__ . '/Bulut/';

    // çağırılan sınıf prefixi içermiyorsa bir sonraki yükleme işlemine geç
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0){
        return;
    }

    // prefix hariç sınıfın kalanı
    $relative_class = substr($class, $len);

    // hepsini birleştirip dizin yolunu oluştur
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // sınıf dosyası var ise yükle
    if (file_exists($file))
        require $file;

});
