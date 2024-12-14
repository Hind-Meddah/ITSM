<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CascadingOptionController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryTicket;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\MarquesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePwdController;
use App\Http\Controllers\Utilisateurs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FirstTimePasswordChangeController;
use App\Http\Controllers\OSController;
use App\Http\Controllers\ProcessorsController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\SwitchController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\MoniteurController;
use App\Http\Controllers\ClavierController;
use App\Http\Controllers\SourisController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\AdmintiketController;
use App\Http\Controllers\usertiketController;
use App\Http\Controllers\techtiketController;


//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth','first.time.login', 'verified'])->name('dashboard');

Route::get('/', [DashboardController::class, 'IndexDashboard'])->middleware(['auth', 'first.time.login', 'verified'])->name('dashboard');
Route::post('/IndexDashboardEtab', [DashboardController::class, 'IndexDashboardEtab'])->middleware(['auth', 'first.time.login', 'verified']);

Route::get('/first-login-change-password', [FirstTimePasswordChangeController::class, 'edit'])->name('password.change');
Route::post('/first-login-change-password', [FirstTimePasswordChangeController::class, 'store'])->name('password.firstimechange');

   Route::get('/ajouter-utilisateur', function () {
         return view('auth.register');
 })->name("ajouter-utilisateur");

Route::middleware(['auth', 'first.time.login','user.role'])->group(function () {
    Route::get('change-password', [ChangePwdController::class, 'edit'])->name('mdp.change');
    Route::post('change-password', [ChangePwdController::class, 'store'])->name('pwd.change');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/Personal-info', function () {
        return view('personalinfo');
    })->name("personalinfo");


    Route::get('/Marque', function () {
        return view('marques');
    })->name("marque");

    Route::get('/activity', [ActivityController::class, 'indexActivity'])->name("activity");
    Route::get('/activity-devices', [ActivityController::class, 'indexActivityDevice'])->name("activity-devices");

    // Route::get('/ajouter-utilisateur', function () {
    //     return view('auth.register');
    // })->name("ajouter-utilisateur");

    Route::get("/utilisateurs", [Utilisateurs::class, 'getUserList'])->name("utilisateur");
    Route::post('/reset-password/{id}', [Utilisateurs::class, 'resetPassword']);
    Route::delete('/delete-user/{id}', [Utilisateurs::class, 'DeleteUser'])->name('delete.user');
    // ticket-create:
    Route::get("/New-Ticket", [DeclarationController::class, 'IndexDeclaration'])->name("newticket");
    Route::post("/storeTicket", [DeclarationController::class, 'StoreDeclaration'])->name("storeticket");
    // adminticket status 
    Route::get('/Tickets', [AdmintiketController::class, 'GetAdminTicket'])->name("tickets");
    Route::post('/DetailsAdminTicket', [AdmintiketController::class, 'DetailsAdminTicket']);
    // Route::post('/DetailsAdminTicket', [AdmintiketController::class, 'DetailsAdminTicket']);

    // userticket status 
    Route::get('/Tickets-user', [usertiketController::class, 'GetUserTicket'])->name("tickets-user");
    Route::post('/DetailsUserTicket', [usertiketController::class, 'DetailsUserTicket']);
    Route::post('/DeleteTicket', [usertiketController::class, 'DeleteTicket']);
    Route::post('/ConfirmerTicket', [usertiketController::class, 'ConfirmerTicket']);

    // teck tickets 
    Route::get('/Ticket-tech', [techtiketController::class, 'GetTechTicket'])->name("tickets-tech");
    Route::post('/GetTechTicket', [techtiketController::class, 'DetailsTechTicket']);
    Route::post('/AccepterTicket', [techtiketController::class, 'AccepterTicket']);
    Route::post('/RefuserTicket', [techtiketController::class, 'RefuserTicket']);
    Route::post('/TerminerTicket', [techtiketController::class, 'TerminerTicket']);

    //Cascading Select option Route
    Route::post('/Getdevice', [CascadingOptionController::class, 'Getdevice']);
    Route::post('/Getordi', [CascadingOptionController::class, 'Getordi']);
    Route::post('/GetSalle', [CascadingOptionController::class, 'GetSalle']);
    Route::post('/GetModel', [CascadingOptionController::class, 'GetModel']);
    Route::post('/GetMarque', [CascadingOptionController::class, 'GetMarque']);

    //Souris routes
    Route::get('/Souris', [SourisController::class, 'IndexSouris'])->name('mouse');
    Route::post('/StoreSouris', [SourisController::class, 'StoreSouris']);
    Route::post('/UpdateSouris', [SourisController::class, 'UpdateSouris']);
    Route::post('/UpdateStoreSouris', [SourisController::class, 'StoreUpdateSouris']);
    Route::post('/DeleteSouris', [SourisController::class, 'DestroySouris']);
    Route::post('/DetailsSouris', [SourisController::class, 'DetailsSouris']);
    //Clavier routes
    Route::get('/Clavier', [ClavierController::class, 'IndexClavier'])->name('keyboard');
    Route::post('/StoreClavier', [ClavierController::class, 'StoreClavier']);
    Route::post('/UpdateClavier', [ClavierController::class, 'UpdateClavier']);
    Route::post('/UpdateStoreClavier', [ClavierController::class, 'StoreUpdateClavier']);
    Route::post('/DeleteClavier', [ClavierController::class, 'DestroyClavier']);
    Route::post('/DetailsClavier', [ClavierController::class, 'DetailsClavier']);
    //Moniteur routes
    Route::get('/Moniteur', [MoniteurController::class, 'IndexMoniteur'])->name('moniteur');
    Route::post('/StoreMoniteur', [MoniteurController::class, 'StoreMoniteur']);
    Route::post('/UpdateMoniteur', [MoniteurController::class, 'UpdateMoniteur']);
    Route::post('/UpdateStoreMoniteur', [MoniteurController::class, 'StoreUpdateMoniteur']);
    Route::post('/DeleteMoniteur', [MoniteurController::class, 'DestroyMoniteur']);
    Route::post('/DetailsMoniteur', [MoniteurController::class, 'DetailsMoniteur']);

    //access routes
    Route::get('/Access-Point', [AccessController::class, 'IndexAccess'])->name('access-point');
    Route::post('/StoreAccess', [AccessController::class, 'StoreAccess']);
    Route::post('/UpdateAccess', [AccessController::class, 'UpdateAccess']);
    Route::post('/UpdateStoreAccess', [AccessController::class, 'StoreUpdateAccess']);
    Route::post('/DeleteAccess', [AccessController::class, 'DestroyAccess']);
    Route::post('/DetailsAccess', [AccessController::class, 'DetailsAccess']);

    //camera routes
    Route::get('/Imprimante', [PrinterController::class, 'IndexImprimante'])->name('printer');
    Route::post('/StoreImprimante', [PrinterController::class, 'StoreImprimante']);
    Route::post('/UpdateImprimante', [PrinterController::class, 'UpdateImprimante']);
    Route::post('/UpdateStoreImprimante', [PrinterController::class, 'StoreUpdateImprimante']);
    Route::post('/DeleteImprimante', [PrinterController::class, 'DestroyImprimante']);
    Route::post('/DetailsImprimante', [PrinterController::class, 'DetailsImprimante']);

    //camera routes
    Route::get('/Camera', [CameraController::class, 'IndexCamera'])->name('camera');
    Route::post('/StoreCamera', [CameraController::class, 'StoreCamera']);
    Route::post('/UpdateCamera', [CameraController::class, 'UpdateCamera']);
    Route::post('/UpdateStoreCamera', [CameraController::class, 'StoreUpdateCamera']);
    Route::post('/DeleteCamera', [CameraController::class, 'DestroyCamera']);
    Route::post('/DetailsCamera', [CameraController::class, 'DetailsCamera']);
    // switch routes
    Route::get('/Switch', [SwitchController::class, 'IndexSwitch'])->name('switch');
    Route::post('/StoreSwitch', [SwitchController::class, 'StoreSwitch']);
    Route::post('/UpdateSwitch', [SwitchController::class, 'UpdateSwitch']);
    Route::post('/UpdateStoreSwitch', [SwitchController::class, 'StoreUpdateSwitch']);
    Route::post('/DeleteSwitch', [SwitchController::class, 'DestroySwitch']);
    Route::post('/DetailsSwitch', [SwitchController::class, 'DetailsSwitch']);

    // Types computer
    Route::get('/Computer', [ComputerController::class, 'IndexComputer'])->name('computer');
    Route::post('/StoreComputer', [ComputerController::class, 'StoreComputer']);
    Route::post('/UpdateComputer', [ComputerController::class, 'UpdateComputer']);
    Route::post('/UpdateStoreComputer', [ComputerController::class, 'StoreUpdateComputer']);
    Route::post('/DeleteComputer', [ComputerController::class, 'DestroyComputer']);
     Route::post('/DetailsComputer', [ComputerController::class, 'DetailsComputer']);

    // Router routs
    Route::get('/Router', [RouterController::class, 'IndexRouter'])->name('router');
    Route::post('/StoreRouter', [RouterController::class, 'StoreRouter']);
    Route::post('/UpdateRouter', [RouterController::class, 'UpdateRouter']);
    Route::post('/UpdateStoreRouter', [RouterController::class, 'StoreUpdateRouter']);
    Route::post('/DeleteRouter', [RouterController::class, 'DestroyRouter']);
    Route::post('/DetailsRouter', [RouterController::class, 'DetailsRouter']);
    // Types routes
    Route::get('/types', [TypeController::class, 'IndexTypes'])->name('types');
    Route::post('/StoreTypes', [TypeController::class, 'StoreTypes']);
    Route::post('/UpdateTypes', [TypeController::class, 'UpdateTypes']);
    Route::post('/UpdateStoreTypes', [TypeController::class, 'StoreUpdateTypes']);
    Route::post('/DeleteTypes', [TypeController::class, 'DestroyTypes']);

    // cpu routes
    Route::get('/Processors', [ProcessorsController::class, 'IndexProcessors'])->name('processor');
    Route::post('/StoreProcessors', [ProcessorsController::class, 'StoreProcessors']);
    Route::post('/UpdateProcessors', [ProcessorsController::class, 'UpdateProcessors']);
    Route::post('/UpdateStoreProcessors', [ProcessorsController::class, 'StoreUpdateProcessors']);
    Route::post('/DeleteProcessors', [ProcessorsController::class, 'DestroyProcessors']);

    // os routes
    Route::get('/OS', [OSController::class, 'IndexOS'])->name('OS');
    Route::post('/StoreOS', [OSController::class, 'StoreOS']);
    Route::post('/UpdateOS', [OSController::class, 'UpdateOS']);
    Route::post('/UpdateStoreOS', [OSController::class, 'StoreUpdateOS']);
    Route::post('/DeleteOS', [OSController::class, 'DestroyOS']);

    // Marques routes
    Route::get('/Marque', [MarquesController::class, 'IndexMarque'])->name('marque');
    Route::post('/StoreMarque', [MarquesController::class, 'StoreMarque']);
    Route::post('/UpdateMarque', [MarquesController::class, 'UpdateMarque']);
    Route::post('/UpdateStoreMarque', [MarquesController::class, 'StoreUpdateMarque']);
    Route::post('/DeleteMarque', [MarquesController::class, 'DestroyMarque']);

    //models routes
    Route::get('/Modele', [ModeleController::class, 'IndexModel'])->name('modele');
    Route::post('/StoreModele', [ModeleController::class, 'StoreModel']);
    Route::post('/UpdateModele', [ModeleController::class, 'UpdateModel']);
    Route::post('/UpdateStoreModele', [ModeleController::class, 'StoreUpdateModel'])->name("update.modeles");
    Route::post('/DeleteModele', [ModeleController::class, 'DestroyModel'])->name("delete.modeles");


    // Establishemnt routes
    Route::get('/etablissements', [EtablissementController::class, 'IndexEstablishement'])->name('establishment');
    Route::post('/addEstablishment', [EtablissementController::class, 'StoreEstablishement'])->name("addEstablishment");
    Route::post('/deleteEstablishment', [EtablissementController::class, 'DeleteEstablishement'])->name("deleteEstablishment");
    Route::post('/modifyEstablishment', [EtablissementController::class, 'ModifyEstablishment'])->name("modifyEstablishment");
    Route::post('/modifyEstablishmentedt', [EtablissementController::class, 'modify']); // Example route definition


    // Classe routes
    Route::get('/salles', [ClassController::class, 'IndexClass'])->name('class');
    Route::post('/addClass', [ClassController::class, 'StoreClass'])->name("addClass");
    Route::post('/deleteClass', [ClassController::class, 'DeleteClass'])->name("deleteClass");
    Route::post('/modifyClass', [ClassController::class, 'ModifyClass'])->name("modifyClass");
    Route::post('/modifyClassedt', [ClassController::class, 'modify']); // Example route definition


    Route::get('/history-tickets', [HistoryTicket::class, 'notificationHistory'])->name('notificationHistory');
    Route::get('/mark-notifications-as-read', [DeclarationController::class, 'markNotificationsAsRead'])->name('mark-notifications-as-read');






    // user
});

require __DIR__ . '/auth.php';
