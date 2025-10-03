<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class CombustibleController extends Controller
{   
    public function estadocontratosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_esc_id' => 'required|integer',
                'p_esc_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_esc_id = $request->has('p_esc_id') ? (int) $request->input('p_esc_id') : 0;
                $p_esc_activo = $request->has('p_esc_activo') ? (int) $request->input('p_esc_activo') : 1;
                $results = DB::select("SELECT * FROM combustible.spu_estadocontrato_sel(?,?)", [
                    $p_esc_id
                    , $p_esc_activo
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

    public function consumogra(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'p_csm_id' => 'required|integer'
            , 'p_con_id' => 'required|integer'
            , 'p_veh_id' => 'required|integer'
            , 'p_cho_id' => 'required|integer'
            , 'p_mon_id' => 'required|integer'
            , 'p_csm_numval' => 'required|integer'
            , 'p_csm_usureg' => 'required|integer'
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
            $p_csm_id = $request->has('p_csm_id') ? (int) $request->input('p_csm_id') : 0;
            $p_con_id = $request->has('p_con_id') ? (int) $request->input('p_con_id') : 0;
            $p_veh_id = $request->has('p_veh_id') ? (int) $request->input('p_veh_id') : 0;
            $p_cho_id = $request->has('p_cho_id') ? (int) $request->input('p_cho_id') : 0;
            $p_mon_id = $request->has('p_mon_id') ? (int) $request->input('p_mon_id') : 1;
            $p_csm_tipcam = $request->has('p_csm_tipcam') ? (float) $request->input('p_csm_tipcam') : 0.000;
            $p_csm_numval = $request->has('p_csm_numval') ? (int) $request->input('p_csm_numval') : 0;
            $p_csm_fecval = $request->has('p_csm_fecval') ? (string) $request->input('p_csm_fecval') : '';
            $p_csm_cankms = $request->has('p_csm_cankms') ? (float) $request->input('p_csm_cankms') : 0.000;
            $p_csm_cangal = $request->has('p_csm_cangal') ? (float) $request->input('p_csm_cangal') : 0.000;
            $p_csm_preuni = $request->has('p_csm_preuni') ? (float) $request->input('p_csm_preuni') : 0.000;
            $p_csm_observ = $request->has('p_csm_observ') ? (string) $request->input('p_csm_observ') : '';
            $p_csm_usureg = $request->has('p_csm_usureg') ? (int) $request->input('p_csm_usureg') : 0;

            $results = DB::select(
                    'SELECT * FROM combustible.spu_contrato_gra(?,?,?,?,?,?,?,?,?,?,?)',
                    [$p_csm_id
                     , $p_con_id
                     , $p_veh_id
                     , $p_cho_id
                     , $p_mon_id
                     , $p_csm_tipcam
                     , $p_csm_numval
                     , $p_csm_fecval
                     , $p_csm_cankms
                     , $p_csm_cangal
                     , $p_csm_preuni
                     , $p_csm_observ
                     , $p_csm_usureg]);

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

    public function Consumosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_csm_id' => 'required|integer',
                'p_con_id' => 'required|integer',
                'p_prv_id' => 'required|integer',
                'p_veh_id' => 'required|integer',
                'p_cho_id' => 'required|integer',
                'p_csm_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }

            try {
                $p_csm_id = $request->has('p_csm_id') ? (int) $request->input('p_csm_id') : 0;
                $p_con_id = $request->has('p_con_id') ? (int) $request->input('p_con_id') : 0;
                $p_prv_id = $request->has('p_prv_id') ? (int) $request->input('p_prv_id') : 0;
                $p_veh_id = $request->has('p_veh_id') ? (int) $request->input('p_veh_id') : 0;
                $p_cho_id = $request->has('p_cho_id') ? (int) $request->input('p_cho_id') : 0;
                $p_csm_fecini = $request->has('p_csm_fecini') ? (string) $request->input('p_csm_fecini') : '';
                $p_csm_fecfin = $request->has('p_csm_fecfin') ? (string) $request->input('p_csm_fecfin') : '';
                $p_csm_activo = $request->has('p_csm_activo') ? (int) $request->input('p_csm_activo') : 1;
                //echo "SELECT * FROM combustible.spu_consumo_sel($p_csm_id, $p_con_id, $p_prv_id, $p_veh_id, $p_cho_id, '$p_csm_fecini', '$p_csm_fecfin', $p_csm_activo)";
                $results = DB::select("SELECT * FROM combustible.spu_consumo_sel(?,?,?,?,?,?,?)", [
                    $p_csm_id
                    , $p_con_id
                    , $p_prv_id
                    , $p_veh_id
                    , $p_cho_id
                    , $p_csm_fecini
                    , $p_csm_fecfin
                    , $p_csm_activo
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

    public function contratogra(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'p_con_id' => 'required|integer'
            , 'p_sed_id' => 'required|integer'
            , 'p_ard_id' => 'required|integer'
            , 'p_prv_id' => 'required|integer'
            , 'p_com_id' => 'required|integer'
            , 'p_mon_id' => 'required|integer'
            , 'p_con_numero' => 'required|integer'
            , 'p_con_usureg' => 'required|integer'
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
            $p_con_id = $request->has('p_con_id') ? (int) $request->input('p_con_id') : 0;
            $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
            $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
            $p_prv_id = $request->has('p_prv_id') ? (int) $request->input('p_prv_id') : 0;
            $p_com_id = $request->has('p_com_id') ? (int) $request->input('p_com_id') : 0;
            $p_mon_id = $request->has('p_mon_id') ? (int) $request->input('p_mon_id') : 1;
            $p_con_numero = $request->has('p_con_numero') ? (int) $request->input('p_con_numero') : 0;
            $p_con_feccon = $request->has('p_con_feccon') ? (string) $request->input('p_con_feccon') : '';
            $p_con_cangal = $request->has('p_con_cangal') ? (int) $request->input('p_con_cangal') : 0;
            $p_con_montot = $request->has('p_con_montot') ? (float) $request->input('p_con_montot') : 0.00;
            $p_con_observ = $request->has('p_con_observ') ? (string) $request->input('p_con_observ') : '';
            $p_con_usureg = $request->has('p_con_usureg') ? (int) $request->input('p_con_usureg') : 0;

            $results = DB::select(
                    'SELECT * FROM combustible.spu_contrato_gra(?,?,?,?,?,?,?,?,?,?,?,?)',
                    [$p_con_id
                     , $p_sed_id
                     , $p_ard_id
                     , $p_prv_id
                     , $p_com_id
                     , $p_mon_id
                     , $p_con_numero
                     , $p_con_feccon
                     , $p_con_cangal
                     , $p_con_montot
                     , $p_con_observ
                     , $p_con_usureg]);

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

    public function Contratosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_con_id' => 'required|integer',
                'p_sed_id' => 'required|integer',
                'p_prv_id' => 'required|integer',
                'p_com_id' => 'required|integer',
                'p_esc_id' => 'required|integer',
                'p_mon_id' => 'required|integer',
                'p_con_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }

            try {
                $p_con_id = $request->has('p_con_id') ? (int) $request->input('p_con_id') : 0;
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_prv_id = $request->has('p_prv_id') ? (int) $request->input('p_prv_id') : 0;
                $p_com_id = $request->has('p_com_id') ? (int) $request->input('p_com_id') : 0;
                $p_esc_id = $request->has('p_esc_id') ? (int) $request->input('p_esc_id') : 0;
                $p_mon_id = $request->has('p_mon_id') ? (int) $request->input('p_mon_id') : 0;
                $p_con_fecini = $request->has('p_con_fecini') ? (string) $request->input('p_con_fecini') : '';
                $p_con_fecfin = $request->has('p_con_fecfin') ? (string) $request->input('p_con_fecfin') : '';
                $p_con_activo = $request->has('p_con_activo') ? (int) $request->input('p_con_activo') : 1;
                $results = DB::select("SELECT * FROM combustible.spu_contrato_sel(?,?,?,?,?,?,?,?,?)", [
                    $p_con_id
                    , $p_sed_id
                    , $p_prv_id
                    , $p_com_id
                    , $p_esc_id
                    , $p_mon_id
                    , $p_con_fecini
                    , $p_con_fecfin
                    , $p_con_activo
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

    public function proveedorgra(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'p_tdi_id' => 'required|integer'
            , 'p_pai_id' => 'required|integer'
            , 'p_udi_id' => 'required|integer'
            , 'p_prv_usureg' => 'required|integer'
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
            $p_udi_id = $request->has('p_udi_id') ? (int) $request->input('p_udi_id') : 0;
            $p_tdi_numero = $request->has('$p_prv_numdoi') ? (int) $request->input('$p_prv_numdoi') : 0;
            $p_per_nombre = $request->has('$p_prv_nombre') ? (string) $request->input('$p_prv_nombre') : '';
            $p_per_feccon = $request->has('$p_prv_feccon') ? (string) $request->input('$p_prv_feccon') : '';
            $p_per_direcc = $request->has('$p_prv_direcc') ? (string) $request->input('$p_prv_direcc') : '';
            $p_per_correo = $request->has('$p_prv_correo') ? (string) $request->input('$p_prv_correo') : '';
            $p_per_telefo = $request->has('$p_prv_telefo') ? (string) $request->input('$p_prv_telefo') : '';
            $p_prv_usureg = $request->has('$p_prv_usureg') ? (int) $request->input('p_prv_usureg') : 0;
            $results = DB::select(
                    'SELECT * FROM combustible.spu_proveedor_gra(?,?,?,?,?,?,?,?,?,?)',
                    [$p_tdi_id
                     , $p_pai_id
                     , $p_udi_id
                     , $p_prv_numdoi
                     , $p_prv_nombre
                     , $p_prv_feccon
                     , $p_prv_direcc
                     , $p_prv_correo
                     , $p_prv_telefo
                     , $p_prv_usureg]);

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

    public function Proveedorsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_prv_id' => 'required|integer',
                'p_per_id' => 'required|integer',
                'p_tdi_id' => 'required|integer',
                'p_prv_activo' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }

            try {
                $p_prv_id = $request->has('p_prv_id') ? (int) $request->input('p_prv_id') : 0;
                $p_per_id = $request->has('p_per_id') ? (int) $request->input('p_per_id') : 0;
                $p_tdi_id = $request->has('p_tdi_id') ? (int) $request->input('p_tdi_id') : 0;
                $p_prv_numdoi = $request->has('p_prv_numdoi') ? (string) $request->input('p_prv_numdoi') : '';
                $p_prv_nombre = $request->has('p_prv_nombre') ? (string) $request->input('p_prv_nombre') : '';
                $p_prv_activo = $request->has('p_prv_activo') ? (int) $request->input('p_prv_activo') : 1;
                $results = DB::select("SELECT * FROM combustible.spu_proveedor_sel(?,?,?,?,?,?)", [
                    $p_prv_id
                    , $p_per_id
                    , $p_tdi_id
                    , $p_prv_numdoi
                    , $p_prv_nombre
                    , $p_prv_activo
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
}