<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class VehiculoController extends Controller
{    
    public function colorvehiculosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_cov_id' => 'required|integer',
                'p_cov_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_cov_id = $request->has('p_cov_id') ? (int) $request->input('p_cov_id') : 0;
                $p_cov_activo = $request->has('p_cov_activo') ? (int) $request->input('p_cov_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_colorvehiculo_sel(?,?)", [
                    $p_cov_id
                    , $p_cov_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function combustiblesel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_com_id' => 'required|integer',
                'p_com_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_com_id = $request->has('p_com_id') ? (int) $request->input('p_com_id') : 0;
                $p_com_activo = $request->has('p_com_activo') ? (int) $request->input('p_com_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_combustible_sel(?,?)", [
                    $p_com_id
                    , $p_com_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function estadovehiculosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_esv_id' => 'required|integer',
                'p_esv_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_esv_id = $request->has('p_esv_id') ? (int) $request->input('p_esv_id') : 0;
                $p_esv_activo = $request->has('p_esv_activo') ? (int) $request->input('p_esv_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_estadovehiculo_sel(?,?)", [
                    $p_esv_id
                    , $p_esv_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function marcasel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_mar_id' => 'required|integer',
                'p_mar_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_mar_id = $request->has('p_mar_id') ? (int) $request->input('p_mar_id') : 0;
                $p_mar_activo = $request->has('p_mar_activo') ? (int) $request->input('p_mar_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_marca_sel(?,?)", [
                    $p_mar_id
                    , $p_mar_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function modelosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_mod_id' => 'required|integer',
                'p_mod_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_mod_id = $request->has('p_mod_id') ? (int) $request->input('p_mod_id') : 0;
                $p_mod_activo = $request->has('p_mod_activo') ? (int) $request->input('p_mod_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_modelo_sel(?,?)", [
                    $p_mod_id
                    , $p_mod_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function marcamodelosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_mmo_id' => 'required|integer',
                'p_mar_id' => 'required|integer',
                'p_mod_id' => 'required|integer',
                'p_mmo_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_mmo_id = $request->has('p_mmo_id') ? (int) $request->input('p_mmo_id') : 0;
                $p_mar_id = $request->has('p_mar_id') ? (int) $request->input('p_mar_id') : 0;
                $p_mod_id = $request->has('p_mod_id') ? (int) $request->input('p_mod_id') : 0;
                $p_mmo_activo = $request->has('p_mmo_activo') ? (int) $request->input('p_mmo_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_marcamodelo_sel(?,?,?,?)", [
                    $p_mmo_id
                    , $p_mar_id
                    , $p_mod_id
                    , $p_mmo_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function tipovehiculosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tve_id' => 'required|integer',
                'p_tve_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }

            try {
                $p_tve_id = $request->has('p_tve_id') ? (int) $request->input('p_tve_id') : 0;
                $p_tve_activo = $request->has('p_tve_activo') ? (int) $request->input('p_tve_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_tipovehiculo_sel(?,?)", [
                    $p_tve_id
                    , $p_tve_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function vehiculosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_veh_id' => 'required|integer',
                'p_tve_id' => 'required|integer',
                'p_esv_id' => 'required|integer',
                'p_mar_id' => 'required|integer',
                'p_mod_id' => 'required|integer',
                'p_cov_id' => 'required|integer',
                'p_com_id' => 'required|integer',
                'p_veh_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }

            try {
                $p_veh_id = $request->has('p_veh_id') ? (int) $request->input('p_veh_id') : 0;
                $p_tve_id = $request->has('p_tve_id') ? (int) $request->input('p_tve_id') : 0;
                $p_esv_id = $request->has('p_esv_id') ? (int) $request->input('p_esv_id') : 0;
                $p_mar_id = $request->has('p_mar_id') ? (int) $request->input('p_mar_id') : 0;
                $p_mod_id = $request->has('p_mod_id') ? (int) $request->input('p_mod_id') : 0;
                $p_cov_id = $request->has('p_cov_id') ? (int) $request->input('p_cov_id') : 0;
                $p_com_id = $request->has('p_com_id') ? (int) $request->input('p_com_id') : 0;
                $p_veh_numpla = $request->has('p_veh_numpla') ? (string) $request->input('p_veh_numpla') : '';
                $p_veh_activo = $request->has('p_veh_activo') ? (int) $request->input('p_veh_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_vehiculo_sel(?,?,?,?,?,?,?,?,?)", [
                    $p_veh_id
                    , $p_tve_id
                    , $p_esv_id
                    , $p_mar_id
                    , $p_mod_id
                    , $p_cov_id
                    , $p_com_id
                    , $p_veh_numpla
                    , $p_veh_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function chofersel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_cho_id' => 'required|integer'
                , 'p_tdi_id' => 'required|integer'
                , 'p_cho_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }

            try {
                $p_cho_id = $request->has('p_cho_id') ? (int) $request->input('p_cho_id') : 0;
                $p_tdi_id = $request->has('p_tdi_id') ? (int) $request->input('p_tdi_id') : 0;
                $p_cho_numdoi = $request->has('p_cho_numdoi') ? (string) $request->input('p_cho_numdoi') : '';
                $p_cho_numlic = $request->has('p_cho_numlic') ? (string) $request->input('p_cho_numlic') : '';
                $p_cho_apepat = $request->has('p_cho_apepat') ? (string) $request->input('p_cho_apepat') : '';
                $p_cho_apemat = $request->has('p_cho_apemat') ? (string) $request->input('p_cho_apemat') : '';
                $p_cho_nombre = $request->has('p_cho_nombre') ? (string) $request->input('p_cho_nombre') : '';
                $p_cho_activo = $request->has('p_cho_activo') ? (int) $request->input('p_cho_activo') : 1;
                $results = DB::select("SELECT * FROM vehiculo.spu_chofer_sel(?,?,?,?,?,?,?,?)", [
                    $p_cho_id
                    , $p_tdi_id
                    , $p_cho_numdoi
                    , $p_cho_numlic
                    , $p_cho_apepat
                    , $p_cho_apemat
                    , $p_cho_nombre
                    , $p_veh_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function chofergra(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'p_tdi_id' => 'required|integer'
            , 'p_pai_id' => 'required|integer'
            , 'p_udn_id' => 'required|integer'
            , 'p_ocu_id' => 'required|integer'
            , 'p_tge_id' => 'required|integer'
            , 'p_udi_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors'  => $validator->errors()
            ], 400);
        }

        try
        {
            $p_tdi_id = $request->has('p_tdi_id') ? (int) $request->input('p_tdi_id') : 0;
            $p_pai_id = $request->has('p_pai_id') ? (int) $request->input('p_pai_id') : 0;
            $p_udn_id = $request->has('p_udn_id') ? (int) $request->input('p_udn_id') : 0;
            $p_ocu_id = $request->has('p_ocu_id') ? (int) $request->input('p_ocu_id') : 0;
            $p_tge_id = $request->has('p_tge_id') ? (int) $request->input('p_tge_id') : 0;
            $p_grf_id = $request->has('p_grf_id') ? (int) $request->input('p_grf_id') : 0;
            $p_esc_id = $request->has('p_esc_id') ? (int) $request->input('p_esc_id') : 0;
            $p_udi_id = $request->has('p_udi_id') ? (int) $request->input('p_udi_id') : 0;
            $p_cho_numdoi = $request->has('p_cho_numdoi') ? (string) $request->input('p_cho_numdoi') : '';
            $p_cho_numlic = $request->has('p_cho_numlic') ? (string) $request->input('p_cho_numlic') : '';
            $p_cho_apepat = $request->has('p_cho_apepat') ? (string) $request->input('p_cho_apepat') : '';
            $p_cho_apemat = $request->has('p_cho_apemat') ? (string) $request->input('p_cho_apemat') : '';
            $p_cho_nombre = $request->has('p_cho_nombre') ? (string) $request->input('p_cho_nombre') : '';
            $p_cho_fecnac = $request->has('p_cho_fecnac') ? (string) $request->input('p_cho_fecnac') : '';
            $p_cho_direcc = $request->has('p_cho_direcc') ? (string) $request->input('p_cho_direcc') : '';
            $p_cho_correo = $request->has('p_cho_correo') ? (string) $request->input('p_cho_correo') : '';
            $p_cho_telefo = $request->has('p_cho_telefo') ? (string) $request->input('p_cho_telefo') : '';
            $p_cho_usureg = $request->has('p_cho_usureg') ? (int) $request->input('p_cho_usureg') : 0;

            $results = DB::select(
                    'SELECT * FROM combustible.spu_chofer_gra(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                    [$p_tdi_id
                     , $p_pai_id
                     , $p_udn_id
                     , $p_ocu_id
                     , $p_tge_id
                     , $p_grf_id
                     , $p_esc_id
                     , $p_udi_id
                     , $p_cho_numdoi
                     , $p_cho_numlic
                     , $p_cho_apepat
                     , $p_cho_apemat
                     , $p_cho_nombre
                     , $p_cho_fecnac
                     , $p_cho_direcc
                     , $p_cho_correo
                     , $p_cho_telefo
                     , $p_cho_usureg]);

            return response()->json($results);
        }
        catch (\Exception $e)
        {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
        }
    }
}