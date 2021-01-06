<?php

namespace App\Exports;

use App\Models\Subscriber\Balance;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BalancesExport implements  FromCollection, WithMapping, WithHeadings {

	use Exportable;
	/**
	 * @return array
	 */
	public function headings(): array {
		// TODO: Implement headings() method.
		return [
			'Date',
			'Branch',
			'Counter Number',
			'Currency',
			'Open Amount',
			'Close Amount',
			'Calculated Amount',
			'Remark'
		];
	}

	/**
	 * @param $balance
	 *
	 * @return array
	 */
	public function map($balance): array {
		// TODO: Implement map() method.
		$date = $balance->created_at;
		if(request()->display_by = 'monthly' || request()->display_by == 'yearly') {
			$date = date('Y', strtotime($date));
		} elseif(request()->display_by = 'weekly') {
			$date = date('M', strtotime($date));
		} elseif(request()->display_by = 'all-time') {
			$date = 'All time';
		}

		return [
			$date,
			$balance->branch->name,
			$balance->counter->name,
			$balance->currency->keyword,
			$balance->amount,
			$balance->close_amount,
			$balance->calculated_amount,
			$balance->remark
		];
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function collection() {
		// TODO: Implement collection() method.
		return Balance::with('currency', 'manager', 'branch')->search(false);
	}
}