<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class MasterController extends Controller
{    

    public function sedessel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sed_id' => 'required|integer',
                'p_udi_id' => 'required|integer',
                'p_sed_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_udi_id = $request->has('p_udi_id') ? (int) $request->input('p_udi_id') : 0;
                $p_sed_activo = $request->has('p_sed_activo') ? (int) $request->input('p_sed_activo') : 1;

                $results = DB::select("SELECT * FROM master.spu_sedes_sel(?,?,?)", [
                    $p_sed_id
                    , $p_udi_id
                    , $p_sed_activo
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

/*     public function sedeanu(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sed_id' => 'required|integer',
                'p_sed_activo' => 'required|integer',
                'p_sed_usumov' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_sed_activo = $request->has('p_sed_activo') ? (int) $request->input('p_sed_activo') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_sede_anu(?,?,?)", [
                    $p_sed_id,$p_sed_activo,$p_sed_usumov
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

    public function sedegra(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sed_id' => 'required|integer',
                'p_udi_id' => 'required|integer',
                'p_sed_usumov' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sed_id = $request->has('p_eep_id') ? (int) $request->input('p_eep_id') : 0;
                $p_udi_id = $request->has('p_eep_id') ? (int) $request->input('p_eep_id') : 0;
                $p_sed_descri = $request->has('p_usu_apepat') ? (string) $request->input('p_usu_apepat') : '';
                $p_sed_abrevi = $request->has('p_usu_apepat') ? (string) $request->input('p_usu_apepat') : '';
                $p_sed_domfis = $request->has('p_usu_apepat') ? (string) $request->input('p_usu_apepat') : '';
                $p_sed_observ = $request->has('p_usu_apepat') ? (string) $request->input('p_usu_apepat') : '';
                $p_sed_usumov = $request->has('p_eep_activo') ? (int) $request->input('p_eep_activo') : 1;
                
                $results = DB::select("SELECT * FROM tickets.spu_sede_gra(?,?)", [
                    $p_eep_id,$p_eep_activo
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
    public function sedeusuarioanu(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sus_id' => 'required|integer',
                'p_sus_activo' => 'required|integer',
                'p_sus_usumov' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sus_id = $request->has('p_sus_id') ? (int) $request->input('p_sus_id') : 0;
                $p_sus_activo = $request->has('p_sus_activo') ? (int) $request->input('p_sus_activo') : 0;
                $p_sus_usumov = $request->has('p_sus_usumov') ? (int) $request->input('p_sus_usumov') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_sedeusuario_anu(?,?,?)", [
                    $p_sus_id,$p_sus_activo,$p_sus_usumov
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

    public function sedeusuariogra(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sed_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_sus_usumov' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_sus_usumov = $request->has('p_sus_usumov') ? (int) $request->input('p_sus_usumov') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_sedeusuario_gra(?,?,?)", [
                    $p_sed_id,$p_usu_id,$p_sus_usumov
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

    public function sedeusuariosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sus_id' => 'required|integer',
                'p_sed_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_sus_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sus_id = $request->has('p_sus_id') ? (int) $request->input('p_sus_id') : 0;
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_sus_activo = $request->has('p_sus_activo') ? (int) $request->input('p_sus_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_sedeusuario_sel(?,?,?,?)", [
                    $p_sus_id,$p_sed_id,$p_usu_id,$p_sus_activo
                ]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    } */
    
}
