<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportesController extends Controller
{
   public function reporte9(){
   	$rol=DB::SELECT("SELECT tie_codigo, 
				   		(SELECT case when sum(pedido_tienda.ped_tie_cantidad)*sum(producto.pro_precio) is null then 0 else sum(pedido_tienda.ped_tie_cantidad)*sum(producto.pro_precio) end
						From public.pedido_tienda, public.producto where pedido_tienda.fk_producto=producto.pro_codigo
						and pedido_tienda.fk_tienda=tienda.tie_codigo 	) as egresos	,
					
						(Select case when sum(com_web_monto) is null then 0 else sum(com_web_monto) end
						 From public.compra_web cw where cw.fk_tienda=tie_codigo) +
						(Select case when sum (com_tie_monto) is null then 0 else sum (com_tie_monto) end
						  from public.compra_tienda where fk_tienda=tie_codigo)as total_ingesos	
						From public.tienda;");
   	
   	return view ('Reporte9',compact('rol'));

   }
   public function reporte10(){
   		$rol=DB::SELECT("SELECT h.hor_hora_entrada , h.hor_hora_salida , e.emp_cedula, e.emp_nombre, e.emp_apellido , e.fk_departamento
					from public.horario h, public.empleado e , public.hor_emp he 
					where e.emp_codigo=he.fk_empleado and he.fk_horario=h.hor_codigo;");

	return view ('Reporte10',compact('rol'));

   }

   public function reporte13J()   {
   		$rol=DB::SELECT("SELECT cn.cli_jur_rif,cn.cli_jur_denominacion_fiscal
						From cliente_juridico cn,compra_tienda ct
						Where cn.cli_jur_rif=ct.fk_cliente_juridico and com_tie_fecha between '2018-01-01'and '2018-12-31'
						group by cn.cli_jur_rif,cn.cli_jur_denominacion_fiscal
						order by count(ct.fk_cliente_juridico) DESC Limit 10;");

   		return view ('Reporte13J',compact('rol'));
	
   }
   public function reporte13N()   {
   		$rol=DB::SELECT("SELECT cn.cli_nat_rif ,cn.cli_nat_ci ,cn.clie_nat_primer_nombre
						From cliente_natural cn,compra_tienda ct
						Where cn.cli_nat_rif=ct.fk_cliente_natural and com_tie_fecha between '2018-01-01'and '2018-12-31'
						group by cn.cli_nat_rif,cn.cli_nat_ci ,cn.clie_nat_primer_nombre
						order by count(ct.fk_cliente_natural) DESC Limit 10;");

   		return view ('Reporte13N',compact('rol'));
	
   }
    public function reporte14J()   {
   		$rol=DB::SELECT("SELECT cn.cli_jur_rif ,cn.cli_jur_denominacion_fiscal,ct.com_tie_monto
						From cliente_juridico cn,compra_tienda ct
						Where cn.cli_jur_rif=ct.fk_cliente_juridico and com_tie_fecha between '2018-01-01'and '2018-12-31'
						group by cn.cli_jur_rif ,cn.cli_jur_denominacion_fiscal,ct.com_tie_monto
						order by max(ct.com_tie_monto) DESC Limit 5;");

   		return view ('Reporte14J',compact('rol'));
	
   }
    public function reporte14N()   {
   		$rol=DB::SELECT("SELECT cn.cli_nat_rif ,cn.cli_nat_ci ,cn.clie_nat_primer_nombre,ct.com_tie_monto
						From cliente_natural cn,compra_tienda ct
						Where cn.cli_nat_rif=ct.fk_cliente_natural and com_tie_fecha between '2018-01-01'and '2018-12-31'
						group by cn.cli_nat_rif,cn.cli_nat_ci ,cn.clie_nat_primer_nombre, ct.com_tie_monto
						order by max(ct.com_tie_monto) DESC Limit 5;");

   		return view ('Reporte14N',compact('rol'));
	
   }
   public function reporte19()   {
   		$rol=DB::SELECT("SELECT p.pro_nombre ,pc.pro_com_cantidad, ct.fk_tienda
						From public.producto p ,public.compra_tienda ct ,public.producto_compra pc
						Where  p.pro_codigo=pc.fk_producto and pc.fk_compra_tienda=ct.com_tie_codigo;");

   		return view ('Reporte19',compact('rol'));
	
   }
       public function reporte20()   {
   		$rol=DB::SELECT("SELECT p.pro_nombre , ct.fk_tienda , l.lug_nombre
						from public.producto p, public.tienda t, public.lugar l, public.producto_compra pc , public.compra_tienda ct
						where  p.pro_codigo= pc.fk_producto and pc.fk_compra_tienda=ct.com_tie_codigo and  ct.fk_tienda=t.tie_codigo and 
						t.fk_lugar=l.lug_codigo
						order by pc.pro_com_cantidad DESC;");

   		return view ('Reporte20',compact('rol'));
	
   }
    public function reporte21()   {
   		$rol=DB::SELECT("SELECT  distinct i.ing_nombre, ip.pro_ing_cantidad
						from public.producto p, public.ingrediente i , public.pro_ing ip
						where  i.ing_codigo=ip.fk_ingrediente and ip.fk_producto=p.pro_codigo
						/*group by i.ing_nombre, ip.pro_ing_cantidad*/
						order by pro_ing_cantidad DESC;");

   		return view ('Reporte21',compact('rol'));
	
   }
   public function reporte22J()   {
   		$rol=DB::SELECT("SELECT cj.cli_jur_rif, cj.cli_jur_denominacion_fiscal,
						(select case when sum(cw.com_web_monto) is null then 0 else sum(com_web_monto) end
						 From public.compra_web cw, public.usuario u 
						 where cw.fk_usuario=u.usu_codigo and u.fk_cliente_juridico=cj.cli_jur_rif)as web ,
						
						(select case when sum (ct.com_tie_monto) is null then 0 else sum (com_tie_monto) end
						  from public.compra_tienda ct where ct.fk_cliente_juridico=cj.cli_jur_rif)as tienda,
						
						(select case when sum(com_web_monto) is null then 0 else sum(com_web_monto) end
						 From public.compra_web cw, public.usuario u 
						 where cw.fk_usuario=u.usu_codigo and u.fk_cliente_juridico=cj.cli_jur_rif) +
						(select case when sum (com_tie_monto) is null then 0 else sum (com_tie_monto) end
						  from public.compra_tienda ct where ct.fk_cliente_juridico=cj.cli_jur_rif)as total_ingresos	
						
						From public.cliente_juridico cj
						order by (select case when sum(com_web_monto) is null then 0 else sum(com_web_monto) end
								 From public.compra_web cw, public.usuario u 
								where cw.fk_usuario=u.usu_codigo and u.fk_cliente_juridico=cj.cli_jur_rif) +
								(select case when sum (com_tie_monto) is null then 0 else sum (com_tie_monto) end
							  from public.compra_tienda ct where ct.fk_cliente_juridico=cj.cli_jur_rif) DESC
						limit 10;");

   		return view ('Reporte22J',compact('rol'));
	
   }
     public function reporte22N()   {
   		$rol=DB::SELECT("SELECT cn.cli_nat_ci, cn.clie_nat_primer_nombre,
						(select case when sum(cw.com_web_monto) is null then 0 else sum(com_web_monto) end
						 From public.compra_web cw, public.usuario u 
						 where cw.fk_usuario=u.usu_codigo and u.fk_cliente_natural=cn.cli_nat_rif)as web ,
						
						(select case when sum (ct.com_tie_monto) is null then 0 else sum (com_tie_monto) end
						  from public.compra_tienda ct where ct.fk_cliente_natural=cn.cli_nat_rif)as tienda,
						
						(select case when sum(com_web_monto) is null then 0 else sum(com_web_monto) end
						 From public.compra_web cw, public.usuario u 
						 where cw.fk_usuario=u.usu_codigo and u.fk_cliente_natural=cn.cli_nat_rif) +
						(select case when sum (com_tie_monto) is null then 0 else sum (com_tie_monto) end
						  from public.compra_tienda ct where ct.fk_cliente_natural=cn.cli_nat_rif)as total_ingresos	
						
						From public.cliente_natural cn
						order by (select case when sum(com_web_monto) is null then 0 else sum(com_web_monto) end
								 From public.compra_web cw, public.usuario u 
								 where cw.fk_usuario=u.usu_codigo and u.fk_cliente_natural=cn.cli_nat_rif) +
								(select case when sum (com_tie_monto) is null then 0 else sum (com_tie_monto) end
								  from public.compra_tienda ct where ct.fk_cliente_natural=cn.cli_nat_rif) DESC	
						limit 10;");

   		return view ('Reporte22N',compact('rol'));
	
   }
}
