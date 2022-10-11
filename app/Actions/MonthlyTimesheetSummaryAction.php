<?php

namespace App\Actions;

use App\Models\Employee;
use App\Models\Timesheet;
use Illuminate\Support\Carbon;

class MonthlyTimesheetSummaryAction
{
    protected array $month_th = [
        '',
        'มกราคม',
        'กุมภาพันธ์',
        'มีนาคม',
        'เมษายน',
        'พฤษภาคม',
        'มิถุนายน',
        'กรกฎาคม',
        'สิงหาคม',
        'กันยายน',
        'ตุลาคม',
        'พฤศจิกายน',
        'ธันวาคม',
    ];

    protected array $remarks = [
        'กลับก่อน',
        'ประชุม/สัมมนาในประเทศ',
        'ลากิจส่วนตัว',
        'ลากิจส่วนตัวครึ่งวันหลัง',
        'ลากิจส่วนตัวครึ่งวันแรก',
        'ลาคลอดบุตร',
        'ลาทัศนศึกษา',
        'ลาป่วย',
        'ลาป่วยครึ่งวันหลัง',
        'ลาป่วยครึ่งวันแรก',
        'ลาพักผ่อน',
        'ลาพักผ่อนครึ่งวันหลัง',
        'ลาพักผ่อนครึ่งวันแรก',
        'ลาศึกษาต่างประเทศ',
        'วันหยุดนักขัตฤกษ์',
        'วันหยุดประจำสัปดาห์',
        'เข้าสาย',
        'เบิกค่าตอบแทน',
        'เบิกค่าตอบแทน(คลินิกพิเศษ)',
        'ไม่ลงเวลาออก',
        'ไม่ลงเวลาเข้า',
        'ไม่ลงเวลาเข้าและเวลาออก',
    ];

    protected array $mapNoTimestampRemarks = [
        'ไม่ลงเวลาเข้า' => 'in', // problem
        'ไม่ลงเวลาออก' => 'out', // problem
        'ไม่ลงเวลาเข้าและเวลาออก' => 'both', // problem
    ];

    protected array $mapLateRemarks = [
        'เข้าสาย' => 'in',
        'กลับก่อน' => 'out',
    ];

    protected array $mapLeaveRemarks = [
        'ลาป่วย' => 'sick', // leave
        'ลาป่วยครึ่งวันหลัง' => 'sick', // leave
        'ลาป่วยครึ่งวันแรก' => 'sick', // leave

        'ลากิจส่วนตัว' => 'business', // leave
        'ลากิจส่วนตัวครึ่งวันหลัง' => 'business', // leave
        'ลากิจส่วนตัวครึ่งวันแรก' => 'business', // leave

        'ลาพักผ่อน' => 'vacation', // leave
        'ลาพักผ่อนครึ่งวันหลัง' => 'vacation', // leave
        'ลาพักผ่อนครึ่งวันแรก' => 'vacation', // leave
    ];

    protected array $remainRemarks = [
        'ลาคลอดบุตร', // leave
        'ลาทัศนศึกษา', // leave
        'ลาศึกษาต่างประเทศ', // leave

        'วันหยุดนักขัตฤกษ์',
        'วันหยุดประจำสัปดาห์',

        'เบิกค่าตอบแทน',
        'เบิกค่าตอบแทน(คลินิกพิเศษ)',
        'ประชุม/สัมมนาในประเทศ',
    ];

    public function __invoke(?string $month, Employee $employee)
    {
        // month available for user
        $firstDate = $employee->timesheets()
            ->orderBy('datestamp')
            ->first();
        $firstDate = $firstDate->datestamp->startOfMonth();
        $lastDate = $employee->timesheets()
            ->orderByDesc('datestamp')
            ->first();
        $lastDate = $lastDate->datestamp->startOfMonth();

        $months = [];
        $lastMonth = null;
        while ($firstDate->lessThanOrEqualTo($lastDate)) {
            $months[$firstDate->format('Y-m-d')] = $this->month_th[$firstDate->month].' '.($firstDate->year + 543);
            $lastMonth = $firstDate->format('Y-m-d');
            $firstDate->addMonth();
        }

        // summary
        if (! $month) {
            $month = $lastMonth;
        }
        $dateRef = Carbon::create($month);
        $timesheets = $employee->timesheets()
            ->whereBetween('datestamp', [$dateRef->clone()->startOfMonth(), $dateRef->clone()->endOfMonth()])
            ->orderBy('datestamp')
            ->get();
        // no timestamp
        $noTimestamp = [
            'in' => 0,
            'out' => 0,
            'both' => 0,
        ];
        // leave
        $leave = [
            'sick' => 0.0,
            'business' => 0.0,
            'vacation' => 0.0,
        ];
        // late
        $late = [
            'in' => 0,
            'out' => 0,
        ];
        $formattedTimesheets = [];
        $holidays = $this->getHolidays($month);
        $noTimestampRemarks = collect(array_keys($this->mapNoTimestampRemarks));
        $leaveRemarks = collect(array_keys($this->mapLeaveRemarks));
        $lateRemarks = collect(array_keys($this->mapLateRemarks));
        foreach ($timesheets as $timesheet) {
            $formattedTimesheet = [
                'day' => $timesheet->datestamp->day,
                'remark' => $timesheet->remark,
            ];
            $tags = [];
            if (
                ! $timesheet->remark
                || $timesheet->datestamp->is('Saturday')
                || $timesheet->datestamp->is('Sunday')
                || $holidays->contains($timesheet->datestamp->format('Y-m-d'))
            ) {
                $formattedTimesheet['tags'] = $tags;
                $formattedTimesheets[] = $formattedTimesheet;

                continue;
            }

            $remarks = explode(' ', $timesheet->remark);
            foreach ($remarks as $remark) {
                // no timestamp
                if ($noTimestampRemarks->contains($remark)) {
                    $noTimestamp[$this->mapNoTimestampRemarks[$remark]] = $noTimestamp[$this->mapNoTimestampRemarks[$remark]] + 1;
                    $tags[] = 'no-timestamp-'.$this->mapNoTimestampRemarks[$remark];
                }

                // leave
                if ($leaveRemarks->contains($remark)) {
                    $leave[$this->mapLeaveRemarks[$remark]] = $leave[$this->mapLeaveRemarks[$remark]] + (str_contains($remark, 'ครึ่ง') ? 0.5 : 1);
                    $tags[] = 'leave-'.$this->mapLeaveRemarks[$remark];
                }

                // late
                if ($lateRemarks->contains($remark)) {
                    $late[$this->mapLateRemarks[$remark]] = $late[$this->mapLateRemarks[$remark]] + 1;
                    $tags[] = 'late-'.$this->mapLateRemarks[$remark];
                }
            }
            $formattedTimesheet['tags'] = $tags;
            $formattedTimesheets[] = $formattedTimesheet;
        }

        $monthsFormatted = [];
        foreach ($months as $value => $label) {
            $monthsFormatted[] = ['value' => $value, 'label' => $label];
        }

        $stats = [
            ['label' => 'ไม่ทาบเข้า', 'data' => $noTimestamp['in'], 'tag' => 'no-timestamp-in'],
            ['label' => 'ไม่ทาบออก', 'data' => $noTimestamp['out'], 'tag' => 'no-timestamp-out'],
            ['label' => 'ไม่ทาบเข้า-ออก', 'data' => $noTimestamp['both'], 'tag' => 'no-timestamp-both'],
            ['label' => 'ลากิจ', 'data' => $leave['business'], 'tag' => 'leave-business'],
            ['label' => 'ลาป่วย', 'data' => $leave['sick'], 'tag' => 'leave-sick'],
            ['label' => 'ลาพักผ่อน', 'data' => $leave['vacation'], 'tag' => 'leave-vacation'],
            ['label' => 'เข้าสาย', 'data' => $late['in'], 'tag' => 'late-in'],
            ['label' => 'ออกก่อน', 'data' => $late['out'], 'tag' => 'late-out'],
        ];

        return [
            'months' => $monthsFormatted,
            'stats' => $stats,
            'timesheets' => $formattedTimesheets,
        ];
    }

    public function getRemarks()
    {
        $remarks = collect([]);
        Timesheet::query()
            ->select('remark')
            ->whereNotNull('remark')
            ->distinct('remark')
            ->pluck('remark')
            ->each(function ($remark) use ($remarks) {
                foreach (explode(' ', $remark) as $word) {
                    if ($remarks->doesntContain($word)) {
                        $remarks[] = $word;
                    }
                }
            });

        return $remarks->sort()->values();
    }

    public function getHolidays($month)
    {
        $dateRef = Carbon::create($month);

        return Timesheet::query()
            ->whereBetween('datestamp', [$dateRef->clone()->startOfMonth(), $dateRef->clone()->endOfMonth()])
            ->where('remark', 'วันหยุดนักขัตฤกษ์')
            ->orderBy('datestamp')
            ->select(['remark', 'datestamp'])
            ->distinct(['remark', 'datestamp'])
            ->pluck('datestamp')
            ->map(fn ($d) => $d->format('Y-m-d'));
    }
}
