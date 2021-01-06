<?php

namespace App\Exports;

use App\Receipt;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionExport implements  FromCollection, WithMapping, WithHeadings {

	use Exportable;
	/**
	 * @return array
	 */
	public function headings(): array {
		// TODO: Implement headings() method.
		return [
			'id',
			'date',
			'user',
			'counter',
			'branch',
			'exchange_from',
			'exchange_to',
			'value',
			'amount',
			'rate'
		];
	}

	/**
	 * @param mixed $row
	 *
	 * @return array
	 */
	public function map($receipt): array {
		// TODO: Implement map() method.
		$data = [];
		foreach($receipt->detail as $exchange) {
			$data[] = [
				$receipt->id,
				$receipt->created_at,
				$receipt->user->first_name . ' ' . $receipt->user->last_name,
				$receipt->user->counter->name,
				$receipt->user->branch->name,
				$exchange->from->keyword,
				$exchange->to->keyword,
				$exchange->value,
				$exchange->amount,
				$exchange->rate
			];
		}

		return $data;
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function collection() {
		// TODO: Implement collection() method.
		return Receipt::with('user', 'user.counter', 'user.branch', 'detail', 'detail.from', 'detail.to')->search();
	}
}