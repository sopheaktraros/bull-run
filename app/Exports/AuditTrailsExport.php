<?php

namespace App\Exports;

use App\AuditTrail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AuditTrailsExport implements  FromCollection, WithMapping, WithHeadings {

	use Exportable;
	/**
	 * @return array
	 */
	public function headings(): array {
		// TODO: Implement headings() method.
		return [
			'Date',
			'User',
			'Detail',
		];
	}

	/**
	 * @param $audit
	 *
	 * @return array
	 */
	public function map($audit): array {
		// TODO: Implement map() method.
		return [
			$audit->date,
			$audit->user,
			$audit->detail
		];
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function collection() {
		// TODO: Implement collection() method.
		$auditTrails = AuditTrail::orderBy('audit_trails.created_at', 'desc')
		                 ->select(
			                 'audit_trails.created_at as date',
			                 DB::raw('CONCAT(users.first_name, " ", users.last_name) as user'),
			                 DB::raw("REPLACE( REPLACE( REPLACE(detail, '<br>', ''), '<b>', ''), '</b>', '') as detail")
		                 )
		                 ->join('users', 'users.id', '=', 'audit_trails.user_id')
		                 ->get();

		return $auditTrails;
	}
}