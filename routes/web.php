<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalculateFeeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TransactionController;
use App\Models\Task;
use App\Models\Plots;
use App\Models\Clients;
use App\Models\Portfolio;

use Illuminate\Support\Carbon;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //$tasks = Task::all();
        $clients = Clients::all();
        $portfolio = Portfolio::all();

        $currentDate = date('Y-m-d');
        $tomorrow = Carbon::now()->addDays(1);
        $tasks = Task::whereDate('duedate', '>=', $currentDate)->get();

        $duetoday = Task::whereDate('duedate', '=', $currentDate)->get();
        $duetomorrow = Task::whereDate('duedate', '=', $tomorrow)->get();
        $overdue = Task::whereDate('duedate', '<=', $currentDate)->get();
        $pailc = Plots::where('pai_lc_expiry', '<=', $currentDate)->get();
        $fiex = Plots::where('fi_expiry', '<=', $currentDate)->get();
        $flex = Plots::where('fl_expiry', '<=', $currentDate)->get();
        $pmoj = Plots::where('poa_moj_expiry', '<=', $currentDate)->get();
        $pwab = Plots::where('poa_warba_expiry', '<=', $currentDate)->get();

    return view('admin.index', compact('tasks','duetoday','duetomorrow','overdue','clients','pailc','fiex','flex','pmoj','pwab','portfolio'));

})->name('dashboard');

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

Route::get('/portfolio',[PortfolioController::class,'Portfolio'])->name('portfolio');
Route::get('/portfolio/create',[PortfolioController::class,'PortfolioCreate'])->name('portfolio.create');
Route::post('/store/portfolio', [PortfolioController::class, 'PortfolioStore'])->name('store.portfolio');
Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'Edit']);
Route::get('/inactive/portfolio/{id}', [PortfolioController::class, 'InactivePortfolio']);
Route::get('/portfolio/inactives',[PortfolioController::class,'PortfolioInactives'])->name('portfolio.inactives');
Route::get('/active/portfolio/{id}', [PortfolioController::class, 'ActivePortfolio']);



Route::get('/clients',[ClientController::class,'Clients'])->name('clients');
Route::get('/client/create',[ClientController::class,'ClientCreate'])->name('client.create');
Route::post('/store/client', [ClientController::class, 'ClientStore'])->name('store.client');
Route::get('/client/edit/{id}', [ClientController::class, 'ClientEdit']);
Route::post('/update/client/{id}', [ClientController::class, 'UpdateClient']);
Route::get('/delete/client/{id}', [ClientController::class, 'DeleteClient']);
Route::get('/search',[ClientController::class, 'SearchClient']);

Route::get('/document/type',[DocumentController::class,'DocType'])->name('document.type');
Route::get('/document/create',[DocumentController::class,'DocCreate'])->name('document.create');
Route::post('/store/document', [DocumentController::class, 'DocStore'])->name('store.document');
Route::get('/document/edit/{id}', [DocumentController::class, 'DocumentEdit']);
Route::post('/update/document/{id}', [DocumentController::class, 'UpdateDocument']);
Route::get('/inactive/document/{id}', [DocumentController::class, 'InactiveDocument']);
Route::get('/active/document/{id}', [DocumentController::class, 'ActiveDocument']);

Route::get('/transaction/addplot',[TransactionController::class,'AddPlot'])->name('transaction.addplot');
Route::get('/plot/create',[TransactionController::class,'PlotCreate'])->name('plot.create');
Route::post('/store/plot', [TransactionController::class, 'PlotStore'])->name('store.plot');
Route::get('/plot/edit/{id}', [TransactionController::class, 'PlotEdit']);
Route::post('/update/plot/{id}', [TransactionController::class, 'UpdatePlot']);
Route::get('/inactive/plot/{id}', [TransactionController::class, 'InactivePlot']);
Route::get('/active/plot/{id}', [TransactionController::class, 'ActivePlot']);
Route::get('/search/plot',[TransactionController::class, 'SearchPlot']);
Route::get('/plot/inactives',[TransactionController::class,'PlotInactives'])->name('plot.inactives');

Route::get('/transaction/newdeal',[TransactionController::class,'NewDeal'])->name('transaction.newdeal');
Route::get('/deal/create',[TransactionController::class,'DealCreate'])->name('deal.create');
Route::post('/store/deal', [TransactionController::class, 'DealStore'])->name('store.deal');
Route::get('/deal/edit/{id}', [TransactionController::class, 'DealEdit']);
Route::post('/update/deal/{id}', [TransactionController::class, 'UpdateDeal']);
Route::get('/inactive/deal/{id}', [TransactionController::class, 'InactiveDeal']);
Route::get('/active/deal/{id}', [TransactionController::class, 'ActiveDeal']);
Route::get('/deal/inactives',[TransactionController::class,'DealInactives'])->name('deal.inactives');

Route::get('/transaction/renewals',[TransactionController::class,'Renewals'])->name('transaction.renewals');
Route::get('/transaction/renewal{id}', [TransactionController::class, 'RenewEdit']);
Route::post('/store/renewal/{id}', [TransactionController::class, 'RenewalStore'])->name('store.renewal');

Route::get('/transaction/merge',[TransactionController::class,'Merge'])->name('transaction.merge');

Route::get('/search/merge',[TransactionController::class, 'SearchMerge']);

Route::get('/deal/merge',[TransactionController::class,'MergeDeals'])->name('merge.create');
Route::post('/store/merge', [TransactionController::class, 'DealMerge'])->name('store.merge');
Route::get('/search/merge',[TransactionController::class, 'SearchDeal']);


Route::get('/transaction/split',[TransactionController::class,'Split'])->name('transaction.split');
Route::get('/deal/split',[TransactionController::class,'SplitDeals'])->name('split.create');
Route::post('/store/split', [TransactionController::class, 'SplitStore'])->name('store.split');
Route::post('/store/split2', [TransactionController::class, 'SplitStore2'])->name('store.split2');



Route::get('/tasks',[TaskController::class,'Task'])->name('tasks');
Route::get('/task/create',[TaskController::class,'TaskCreate'])->name('task.create');
Route::post('/store/task', [TaskController::class, 'TaskStore'])->name('store.task');
Route::get('/task/edit/{id}', [TaskController::class, 'TaskEdit']);
Route::post('/update/task/{id}', [TaskController::class, 'UpdateTask']);
Route::get('/close/task/{id}', [TaskController::class, 'closeTask']);
Route::get('/task/view',[TaskController::class,'TaskView'])->name('task.view');
Route::get('/dash/view/{id}',[TaskController::class,'DashView'])->name('dash.view');




Route::get('/calculatefee',[CalculateFeeController::class,'CalculateFee'])->name('calculateFee');
Route::get('/calculate/fee',[CalculateFeeController::class,'Calculate'])->name('calculate.fee');

Route::get('/plot/renew',[TransactionController::class,'RenewSearch'])->name('plot.renew');

Route::get('/transfer',[TransactionController::class,'Transfer'])->name('transaction.transfer');
Route::get('/transfer/plots',[TransactionController::class,'TransferPlot'])->name('transfer.plots');

Route::get('/reports',[ReportsController::class,'Reports'])->name('reports');
Route::get('/reports/list',[ReportsController::class,'ReportList'])->name('report.list');
Route::get('/reports/divmerge',[ReportsController::class,'DivMerge'])->name('reports.divmer');

Route::get('/reports/divmergereport',[ReportsController::class,'DivMergeReport'])->name('report.divmerge');

Route::get('/reports/divmergepdf',[ReportsController::class,'DivMergePdf'])->name('report.divmerpdf');

Route::get('/reports/split',[ReportsController::class,'Split'])->name('reports.split');

Route::get('/reports/splitreport',[ReportsController::class,'SplitReport'])->name('report.splitreport');


Route::get('importExportView', [ReportsController::class, 'importExportView']);
Route::get('export', [ReportsController::class, 'export'])->name('export');
Route::post('import', [ReportsController::class, 'import'])->name('import');
Route::get('/employee/pdf',[ReportsController::class, 'createPDF']);

Route::get('/reports/plotadd',[ReportsController::class,'PlotAdd'])->name('reports.plotadd');
Route::get('/reports/plotaddreport',[ReportsController::class,'PlotAddReport'])->name('report.plotaddreport');
Route::get('/reports/plotaddpdf',[ReportsController::class,'PlotAddCreatePDF'])->name('report.plotaddpdf');


Route::get('/reports/plotClose',[ReportsController::class,'PlotClose'])->name('reports.plotclose');
Route::get('/reports/plotclosereport',[ReportsController::class,'PlotCloseReport'])->name('report.closereport');
Route::get('/reports/plotclosepdf',[ReportsController::class,'PlotCloseCreatePDF'])->name('report.plotclosepdf');

Route::get('/reports/renewals',[ReportsController::class,'Renewals'])->name('reports.renewals');
Route::get('/reports/renewalsreport',[ReportsController::class,'RenewalsReport'])->name('report.renewalsreport');
Route::get('/reports/renewalspdf',[ReportsController::class,'RenewalsCreatePDF'])->name('report.renewalspdf');

Route::get('/reports/delegation',[ReportsController::class,'Delegation'])->name('reports.delegation');
Route::get('/reports/delegationreport',[ReportsController::class,'DelegationReport'])->name('report.delegationreport');
Route::get('/reports/delegationpdf',[ReportsController::class,'DelegationCreatePDF'])->name('report.delegationpdf');

Route::get('/reports/finance',[ReportsController::class,'Finance'])->name('reports.finance');
Route::get('/reports/financereport',[ReportsController::class,'FinanceReport'])->name('report.financereport');
Route::get('/reports/financepdf',[ReportsController::class,'FinanceCreatePDF'])->name('report.financepdf');

Route::get('/reports/mgfee',[ReportsController::class,'MGFee'])->name('reports.mgfee');
Route::get('/reports/mgfeereport',[ReportsController::class,'MGFeeReport'])->name('report.mgfeereport');
Route::get('/reports/mgfeepdf',[ReportsController::class,'MGFeeCreatePDF'])->name('report.mgfeepdf');


Route::get('/reports/task',[ReportsController::class,'Task'])->name('reports.task');
Route::get('/reports/taskreport',[ReportsController::class,'TaskReport'])->name('report.taskreport');
Route::get('/reports/taskpdf',[ReportsController::class,'TaskCreatePDF'])->name('report.taskpdf');

Route::get('/reports/taskcompleted',[ReportsController::class,'TaskComplete'])->name('reports.taskcomplete');
Route::get('/reports/taskcompletereport',[ReportsController::class,'TaskCompleteReport'])->name('report.taskcompletereport');


Route::get('search', [TransactionController::class,'index']);
Route::get('ajax-autocomplete-search', [TransactionController::class,'selectSearch']);













































