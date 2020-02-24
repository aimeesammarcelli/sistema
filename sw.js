laissez  version  =  '0.4' ;
console . log ( `Version BETA $ { version } chargée` ) ;


const  cacheName  =  'BETA' ;

const  filesToCache  =  [
  './' ,
  «./css/style.css» ,
  «./css/style2.css» ,
  «./css/mobile.css»
] ;

moi . addEventListener ( 'install' ,  fonction ( événement ) {
  console . log ( ` $ { cacheName } install` ) ;
  événement . waitUntil (
    caches . ouvert ( cacheName ) . alors ( fonction ( cache ) {
      console . log ( ` $ { cacheName } fichiers de mise en cache` ) ;
      retourner le  cache . addAll ( filesToCache ) ;
    } )
  ) ;
  // décommenter ceci pour l'activer lors de l'installation
  moi . skipWaiting ( ) ;
} ) ;

moi . addEventListener ( 'activate' ,  event  =>  {
  événement . waitUntil ( auto . clients . claim ( ) ) ;
  console . log ( ` $ { cacheName } activate` ) ;
} ) ;
moi . addEventListener ( 'fetch' ,  fonction ( événement )  {
  événement . respondWith (
    chercher ( événement . demande ) . catch ( fonction ( )  {
      console . journal ( 'chargé depuis le cache' ,  demande d' événement . ) ;
      retourner les  caches . match ( événement . demande ) ;
    } )
  ) ;
  console . log ( 'réseau puis repli vers le cache' ) ;
} ) ;