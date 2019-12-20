<?php

namespace App\Providers; 
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\ServiceProvider;
    use DB;
    use App\Model\BinhLuan;
    use App\Model\HopThu;
    use App\Model\TinTuc;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 
        // NGƯỜI DÙNG
        view()->composer('*', function($view){ 
            $trangchu = DB::table('trang_chus')->first();
            $lienket = DB::table('lien_kets')->get();
            $theloai =  DB::table('the_loais')->orderBy('uutien', 'asc')->get();
            $dulieuthongbao = DB::table('thong_baos')->first();  
            $tatcatheloai = DB::table('the_loais')->get();
            $loaitin =  DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id')  
                            ->select('loai_tins.*') 
                            ->distinct('id_loaitin')
                            ->get();
            $demtheloaichung = DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
                            ->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
                            ->select('the_loais.id as idTheLoai','tin_tucs.id_loaitin') 
                            ->distinct('idTheLoai')
                            ->get();
            $theloaicotintucchung = DB::table('tin_tucs')
                                    ->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
                                    ->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
                                    ->select('the_loais.id as idTheLoai') 
                                    ->distinct('idTheLoai')
                                    ->get();
            $baiviettheoloaichung = DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
                                    ->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
                                    ->select('tin_tucs.id','the_loais.id as idTheLoai','tin_tucs.tieude')  
					                ->orderBy('id', 'desc')  
                                    ->get();
            $motbaiviettheoloaichung = DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
                                    ->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
                                    ->select('tin_tucs.*','the_loais.id as idTheLoai')  
                                    ->orderBy('id', 'desc')  
                                    ->get();
            $baivietnoibatchung = DB::table('tin_tucs')->select('tin_tucs.id','tin_tucs.tieude','tin_tucs.hinhdaidien')
                                    ->where('noibat','=',1)  
                                    ->orderBy('id', 'desc')   
                                    ->limit(5)
                                    ->get();
            $baiviettopngaunhienchung = DB::table('tin_tucs')->where('noibat','=',1) ->inRandomOrder()->get();
            $binhluanchung = BinhLuan::all();

            // QUẢN TRỊ VIÊN
            $hopthuchuadocchung = DB::table("hop_thus")->where('daxem','=','0')->get();
            $view->with([
                    'tatcatheloai'=>$tatcatheloai, 
                    'loaitin'=>$loaitin, 
                    'trangchu'=>$trangchu, 
                    'lienket'=>$lienket, 
                    'theloai'=>$theloai, 
                    "dulieuthongbao" =>$dulieuthongbao,
                    'demtheloaichung'=>$demtheloaichung,
                    'baiviettheoloaichung'=>$baiviettheoloaichung,
                    'motbaiviettheoloaichung'=>$motbaiviettheoloaichung,
                    'baivietnoibatchung'=>$baivietnoibatchung,
                    'binhluanchung'=>$binhluanchung,
                    'hopthuchuadocchung'=>$hopthuchuadocchung,
                    'theloaicotintucchung'=>$theloaicotintucchung,
                    'baiviettopngaunhienchung'=>$baiviettopngaunhienchung,
                ]); 
        });
    }
 
}
