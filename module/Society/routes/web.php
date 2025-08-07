<?php

use Illuminate\Support\Facades\Route;
use Module\Society\Controllers\AdvanceBillController;
use Module\Society\Controllers\FlatController;
use Module\Society\Controllers\PlotController;
use Module\Society\Controllers\RoadController;
use Module\Society\Controllers\YearController;
use Module\Society\Controllers\BlockController;
use Module\Society\Controllers\BuildingController;
use Module\Society\Controllers\PaymentController;
use Module\Society\Controllers\CsvUploadController;
use Module\Society\Controllers\UsageTypeController;
use Module\Society\Controllers\PaidUnpaidController;
use Module\Society\Controllers\GenerateBillController;
use Module\Society\Controllers\MoneyCollectorController;
use Module\Society\Controllers\reportController;


Route::group(['prefix' => 'society', 'middleware' => ['auth', 'user']], function () {});

Route::group(['prefix' => 'society', 'middleware' => 'societyadmin'], function () {


    // block
    Route::get('/create-blocks',                        [BlockController::class, 'create'])->name('block.create');
    Route::get('/{id}/edit-blocks',                     [BlockController::class, 'edit'])->name('block.edit');
    Route::post('/store-blocks',                        [BlockController::class, 'store'])->name('block.store');
    Route::post('/{id}/update-blocks',                  [BlockController::class, 'update'])->name('block.update');
    Route::post('/{id}/delete-blocks',                  [BlockController::class, 'delete'])->name('block.delete');


    // money collector
    Route::get('/create-money-collector',               [MoneyCollectorController::class, 'create'])->name('moneyCollector.create');
    Route::get('/{id}/edit-money-collector',            [MoneyCollectorController::class, 'edit'])->name('moneyCollector.edit');
    Route::post('/store-money-collector',               [MoneyCollectorController::class, 'store'])->name('moneyCollector.store');
    Route::post('/{id}/update-money-collector',         [MoneyCollectorController::class, 'update'])->name('moneyCollector.update');
    Route::post('/{id}/delete-money-collector',         [MoneyCollectorController::class, 'delete'])->name('moneyCollector.delete');


    // road
    Route::get('/create-road',                          [RoadController::class, 'create'])->name('road.create');
    Route::get('/{id}/edit-road',                       [RoadController::class, 'edit'])->name('road.edit');
    Route::post('/store-road',                          [RoadController::class, 'store'])->name('road.store');
    Route::post('/{id}/update-road',                    [RoadController::class, 'update'])->name('road.update');
    Route::post('/{id}/delete-road',                    [RoadController::class, 'delete'])->name('road.delete');


    // usage type
    Route::get('/create-usages-types',                  [UsageTypeController::class, 'create'])->name('usageType.create');
    Route::get('/{id}/edit-usages-types',               [UsageTypeController::class, 'edit'])->name('usageType.edit');
    Route::post('/store-usages-types',                  [UsageTypeController::class, 'store'])->name('usageType.store');
    Route::post('/{id}/update-usages-types',            [UsageTypeController::class, 'update'])->name('usageType.update');
    Route::post('/{id}/delete-usages-types',            [UsageTypeController::class, 'delete'])->name('usageType.delete');


    // plot
    Route::get('/create-plot',                          [PlotController::class, 'create'])->name('plot.create');
    Route::get('/{id}/edit-plot',                       [PlotController::class, 'edit'])->name('plot.edit');
    Route::post('/store-plot',                          [PlotController::class, 'store'])->name('plot.store');
    Route::post('/{id}/update-plot',                    [PlotController::class, 'update'])->name('plot.update');
    Route::post('/{id}/delete-plot',                    [PlotController::class, 'delete'])->name('plot.delete');
    Route::get('/getRoadsByBlock/{blockName}',          [PlotController::class, 'getRoadsByBlock'])->name('roads.byblock');



    // Building
    Route::get('/create-building',                      [BuildingController::class, 'create'])->name('building.create');
    Route::get('/{id}/edit-building',                   [BuildingController::class, 'edit'])->name('building.edit');
    Route::post('/store-building',                      [BuildingController::class, 'store'])->name('building.store');
    Route::post('/{id}/update-building',                [BuildingController::class, 'update'])->name('building.update');
    Route::post('/{id}/delete-building',                [BuildingController::class, 'delete'])->name('building.destroy');
    Route::get('/get-road/{blockName}',                 [BuildingController::class, 'getRoadInfoByBlock']);
    Route::get('/get-plot/{roadName}',                  [BuildingController::class, 'getPlotInfoByRoad']);
    Route::get('/getRoadsByplot/{blockName}',           [BuildingController::class, 'getRoadsByplot']);



    // flat
    Route::get('/create-flat',                          [FlatController::class, 'create'])->name('flat.create');
    Route::get('/{id}/edit-flat',                       [FlatController::class, 'edit'])->name('flat.edit');
    Route::post('/store-flat',                          [FlatController::class, 'store'])->name('flat.store');
    Route::post('/{id}/update-flat',                    [FlatController::class, 'update'])->name('flat.update');
    Route::post('/{id}/delete-flat',                    [FlatController::class, 'delete'])->name('flat.delete');
    Route::get('/getPlotsByBlock/{block}',              [FlatController::class, 'getPlotsByBlock'])->name('flat.byblock');
    Route::get('get-road-for-flat/{blockName}',         [FlatController::class, 'getRoadInfoByBlock']);
    Route::get('get-plot-for-flat/{roadName}',          [FlatController::class, 'getPlotInfoByRoad']);
    Route::get('get-flats-for-flat/{plotName}',         [FlatController::class, 'getFlatsByPlot']);
    Route::get('get-owner-for-flat/{flatName}',         [FlatController::class, 'getOwnerByFlat']);
    Route::get('/get-owner-name',                       [FlatController::class, 'getOwnerName']);
    Route::get('/getAmountByType/{typeName}',           [FlatController::class, 'getAmountByType'])->name('flat.bytype');
    Route::get('/flat-list',                            [FlatController::class, 'list'])->name('flat.list');
    Route::get('/filter-flat',                          [FlatController::class, 'filterFlat'])->name('filter.flat');
    Route::get('/flats/export',                         [FlatController::class, 'downloadFilteredCSV'])->name('flats.export.csv');
    Route::get('/flats/export/excel',                   [FlatController::class, 'downloadFilteredExcel'])->name('flats.export.excel');


    // Route::get('/flats/duevalueupdate', [FlatController::class, 'duevalueUpdate'])->name('flats.dueValueUpdate');
    // Route::get('/flats/updatehouseplot', [FlatController::class, 'updatehouseplot'])->name('flats.updatehouseplot');


    // year
    Route::get('/create-year',                          [YearController::class, 'create'])->name('year.create');
    Route::get('/{id}/edit-year',                       [YearController::class, 'edit'])->name('year.edit');
    Route::post('/store-year',                          [YearController::class, 'store'])->name('year.store');
    Route::post('/{id}/update-year',                    [YearController::class, 'update'])->name('year.update');
    Route::post('/{id}/delete-year',                    [YearController::class, 'delete'])->name('year.delete');



    // generate bills
    Route::get('/create-generate-bill',                 [GenerateBillController::class, 'create'])->name('generateBill.create');
    Route::get('/{id}/edit-generate-bill',              [GenerateBillController::class, 'edit'])->name('generateBill.edit');
    Route::post('/store-generate-bill',                 [GenerateBillController::class, 'store'])->name('generateBill.store');
    Route::post('/save-generate-bill',                  [GenerateBillController::class, 'saveGenerateBill'])->name('generateBill.save');
    Route::post('/save-generate-single-bill',           [GenerateBillController::class, 'saveGenerateSingleBill'])->name('generateSingleBill.save');
    Route::post('/truncate-temp-generate-bill',         [GenerateBillController::class, 'truncateTempGenerateBill'])->name('generateBill.truncate');
    Route::post('/truncate-temp-generate-single-bill',  [GenerateBillController::class, 'truncateTempGenerateSingleBill'])->name('generateSingleBill.truncate');
    Route::post('/yearlyStore-generate-bill',           [GenerateBillController::class, 'yearlyStore'])->name('generateBill.yearlyStore');
    Route::post('/{id}/update-generate-bill',           [GenerateBillController::class, 'update'])->name('generateBill.update');
    Route::get('/delete-generate-bill/{billingID}',     [GenerateBillController::class, 'delete'])->name('generateBill.delete');
    Route::post('/delete-generate-single-bill/{id}',    [GenerateBillController::class, 'singleBillDelete'])->name('single.generateBill.delete');
    Route::get('/generate-bill/{id}',                   [GenerateBillController::class, 'bill'])->name('generateBill.bill');
    Route::get('/generate-single-bill/{id}',            [GenerateBillController::class, 'singleBill'])->name('single.generateBill.bill');

    Route::get('/create-generate-single-bill',          [GenerateBillController::class, 'singleBillCreate'])->name('generateBill.singleBillCreate');
    Route::post('/store-generate-single-bill',          [GenerateBillController::class, 'singleBillStore'])->name('generateBill.single.store');


    Route::get('/bill-list/{billingID}',                [GenerateBillController::class, 'list'])->name('generateBill.list');
    Route::get('/bill-road-list/{roadID}',              [GenerateBillController::class, 'roadList'])->name('generateBill.road.list');
    Route::get('generateBill/{id}/edit',                [GenerateBillController::class, 'billedit'])->name('generateBill.billedit');
    Route::put('generateBill/{id}',                     [GenerateBillController::class, 'billupdate'])->name('generateBill.billupdate');
    Route::delete('/generateBill/delete/{id}',          [GenerateBillController::class, 'billdelete'])->name('generateBill.billdelete');


    Route::get('/generate-yearly-bill/{billingID}',     [GenerateBillController::class, 'yearlyBill'])->name('generateBill.yearlyBill');
    Route::get('/getRoadInfoByBlock/{blockName}',       [GenerateBillController::class, 'getRoadInfoByBlock'])->name('generateBill.byblock');
    Route::get('/getPlotInfoByRoad/{roadName}',         [GenerateBillController::class, 'getPlotInfoByRoad'])->name('generateBill.byroad');
    
    Route::get('/generate-pdf/{billingID}',             [GenerateBillController::class, 'generatePDF'])->name('generateBill.pdf');
    Route::get('/road-generate-pdf/{blockID}',          [GenerateBillController::class, 'roadGeneratePDF'])->name('road.generateBill.pdf');
    Route::get('/block-generate-pdf/{blockID}',         [GenerateBillController::class, 'blockGeneratePDF'])->name('block.generateBill.pdf');
    Route::get('/generate-single-pdf/{billing_ID}',     [GenerateBillController::class, 'generateSingleBillPDF'])->name('single.generateBill.pdf');
    Route::get('/generate-yearlyPdf/{billingID}',       [GenerateBillController::class, 'generateYearlyPdf'])->name('generateBill.yearlyPdf');
    Route::get('/create-yearly-generate-bill',          [GenerateBillController::class, 'yearlyBillCreate'])->name('generateBill.yearlyBillCreate');


    // payment
    Route::get('/payments/create',                      [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments',                            [PaymentController::class, 'store'])->name('payments.store');
    Route::post('/payments/print-acknowledgement/{flatID}', [PaymentController::class, 'printAcknowledgement'])->name('print.acknowledgement');
    Route::get('/get-months',                           [PaymentController::class, 'getMonths']);

    //ajax routes for payment 
    Route::get('/get-road-info-by-block/{blockName}',   [PaymentController::class, 'getRoadInfoByBlock'])->name('generateBill.byblock');
    Route::get('/get-plot-info-by-road/{roadName}',     [PaymentController::class, 'getPlotInfoByRoad'])->name('generateBill.byroad');
    Route::get('/filter-bill-payment-entry',            [PaymentController::class, 'filterBillPaymentEntry'])->name('filter.bill.payment.entry');
    Route::post('/get-dynamic-data',                    [PaymentController::class, 'getDynamicData'])->name('get.dynamic.data');



    // Paid/Unpaid
    Route::get('/paid-unpaid/list',                     [PaidUnpaidController::class, 'list'])->name('paidUnpaid.list');
    Route::get('/filter-paid-unpaid-bill',              [PaidUnpaidController::class, 'filterPaidUnpaidBill'])->name('paidUnpaid.filterPaidUnpaidBill');
    Route::get('/paid-unpaid/preview-bill',             [PaidUnpaidController::class, 'previewBill'])->name('paidUnpaid.previewBill');
    Route::get('/paid-unpaid/preview-money-receipt',    [PaidUnpaidController::class, 'previewMoneyReceipt'])->name('paidUnpaid.previewMoneyReceipt');


    // Advance Bill
    Route::get('/advance-bill/list',                    [AdvanceBillController::class, 'list'])->name('advanceBill.list');
    Route::get('/getRoad/{blockName}',                  [AdvanceBillController::class, 'getRoadInfoByBlock'])->name('advanceBill.byblock');
    Route::get('/advance/getRoadInfoByBlock/{blockName}', [AdvanceBillController::class, 'getRoadInfoByBlock']);
    Route::get('/advance/getPlotInfoByRoad/{roadName}', [AdvanceBillController::class, 'getPlotInfoByRoad']);
    Route::get('/advance/getFlatInfoByPlot/{plotName}', [AdvanceBillController::class, 'getFlatInfoByPlot']);
    Route::post('/adv-bill-generate',                   [AdvanceBillController::class, 'advBillGenerate'])->name('advance.bill.generate');
    Route::get('/adv-bill/generate-pdf/{billingID}',    [AdvanceBillController::class, 'generatePDF'])->name('adv.bill.generateBill.pdf');
    Route::get('/adv-bill/generate-bill/{id}',          [AdvanceBillController::class, 'bill'])->name('adv.bill.generateBill');
    Route::delete('/adv-bill/generateBill/delete/{id}', [AdvanceBillController::class, 'billdelete'])->name('adv.bill.generateBill.billdelete');



    //Report
    Route::get('report',                                [reportController::class, 'report'])->name('report');
    Route::get('/print-billing-info',                   [reportController::class, 'printInfo'])->name('print.report');
    Route::get('/report/filtered-bill',                 [reportController::class, 'filteredBill']);
    Route::get('/get-plot',                             [reportController::class, 'getPlot'])->name('getPlot');
    Route::get('/get-filtered-bills',                   [reportController::class, 'getFilteredBills'])->name('get-filtered-bills');
    Route::get('/report/getRoadInfoByBlock/{blockName}', [reportController::class, 'getRoadInfoByBlock'])->name('generateBill.byblock');
    Route::get('/report/getPlotInfoByRoad/{roadName}',  [reportController::class, 'getPlotInfoByRoad'])->name('generateBill.byroad');

    Route::get('/export-plot-report',                   [reportController::class, 'exportPlotReport'])->name('export.plot.report');


    // Upload CSV file
    Route::post('/upload-csv',                          [CsvUploadController::class, 'upload'])->name('upload.csv');
    Route::get('/download-csv',                         [CsvUploadController::class, 'downloadCSV'])->name('download.csv');
    Route::get('/download-sample-csv',                  [CsvUploadController::class, 'downloadSampleCsv'])->name('download.sample.csv');
});
