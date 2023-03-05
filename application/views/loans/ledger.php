<?php $query = $this->db->query("SELECT * FROM `info` WHERE 1"); $info = $query->row(); ?>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-9">
        <div class="row align-items-center">
            <div class="col">
                <h6 class="page-pretitle">
                    <?= $title ?>
                </h6>
                <h4 class="page-title">LOAN NO: L0<?= $loans->id ?></h4>
            </div>
            <div class="col-auto">
                <a href="javascript:void(0)" class="btn btn-primary ml-2" onclick="printDiv('printThis')">
                    Print
                </a>
            </div>
        </div>
        <div class="page-divider"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-invoice" id="printThis">
                    <div class="card-header">
                        <div class="row" style="margin-bottom:2px;">
                            <div class="col-3 text-center">
                                <img src="<?= !empty($info->name) ? site_url('assets/uploads/system/').$info->logo : site_url('assets/img/loan-favicon.png') ?>"
                                    class="img-fluid" width="80">
                            </div>
                            <div class="col-6 text-center">
                                <h3 class="mb-0" style="line-height:1.2"><?= $info->bname ?></h3>
                                <h5 class="font-bold mb-0 mt-0"><?= $info->address ?></h5>
                                <p class="mt-0 font-12 font-bold">Contact
                                    No.<?= $info->contact ?>/Email:<?= $info->email ?>
                                </p>
                            </div>
                            <div class="col-3 text-center" style="visibility:hidden">
                                <img src="http://localhost/brgy-v2/assets/uploads/a3806eb2b6a8a6a0ac3b8686a22f5f04.png"
                                    class="img-fluid" width="120">
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="invoice-title"><b><?= $title ?></b></h2>
                        </div>
                        <div class="invoice-header">
                            <div>
                                <h2>
                                    <?=  $loans->firstname.' '.$loans->middlename.' '.$loans->lastname ?>
                                </h2>
                            </div>
                        </div>
                        <div class="invoice-desc">
                            Address:
                            <?= $loans->address1.' '. $loans->address2.' '. $loans->city.' '. $loans->province.' '. $loans->zipcode.' '. $loans->country ?>
                        </div>
                        <div class="invoice-desc">
                            Loan No: L0<?= $loans->id ?>
                        </div>
                        <div class="invoice-desc">
                            Total Amount Loan: <?= $info->currency ?> <?= number_format($loans->total_amount, 2) ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="separator-solid"></div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Date Started</h5>
                                <p><?= date('F d, Y', strtotime($loans->date_started)) ?></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Maturity Date</h5>
                                <p><?= date('F d, Y', strtotime($loans->maturity_date)) ?></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Amount Loan</h5>
                                <p>
                                    <?= $info->currency ?> <?= number_format($loans->principal, 2) ?>
                                </p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Payment</h5>
                                <p>
                                    <?= $info->currency ?> <?= number_format($loans->monthly, 2) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Loan Type</h5>
                                <p><?= $loans->loan_type ?></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Terms</h5>
                                <p><?= $loans->terms ?> <?= $loans->terms2 ?></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Interest</h5>
                                <p>
                                    <?= $loans->interest ?> %
                                </p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3 info-invoice">
                                <h5 class="sub">Penalty</h5>
                                <p>
                                    <?= $loans->penalty ?> %
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-detail">
                                    <div class="invoice-item">
                                        <div class="table-responsive">
                                            <table class="table-bordered w-100" id="ledger">
                                                <thead>
                                                    <tr>
                                                        <th colspan="9" class="text-center">Payment Ledger</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Principal Loan Amount</th>
                                                        <th colspan="3"></th>
                                                        <th colspan="3" class="text-center">Breakdown of Payment</th>
                                                        <th class="text-right">
                                                            <?= $info->currency.' '. number_format($loans->principal, 2) ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-right">Total Due</th>
                                                        <th class="text-right">Paid</th>
                                                        <th class="text-right">Unpaid</th>
                                                        <th class="text-right">Principal</th>
                                                        <th class="text-right">Interest</th>
                                                        <th class="text-right">Penalty</th>
                                                        <th class="text-right">Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($payments)) :
                                                        $no = 1;
                                                        $amount = 0;
                                                        $total = $loans->principal; ?>
                                                    <?php foreach ($payments as $row) :
                                                    
                                                            $due = $row['due'] + $row['p_interest'] + $row['p_penalty'];
                                                            if (!$row['amount']) {
                                                                $principal = 0;
                                                            } else {
                                                                $principal = $row['amount'] - ($row['p_interest'] + $row['p_penalty']);
                                                            }

                                                            $amount += $principal;
                                                            $balance = $total - $amount;
                                                        ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td class="text-center">
                                                            <?= !empty($row['date']) ? date('m/d/Y', strtotime($row['date'])) : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= !empty($row['date']) ? $info->currency.' '.number_format($due, 2) : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= !empty($row['date']) ? $info->currency.' '.$row['amount'] : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $row['status'] == 'Paid' ? '0.00' : null ?>
                                                            <?= $row['status'] == 'Partial' || $row['status'] == 'Unpaid' ? $info->currency.' '.number_format($due - $row['amount'], 2) : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $row['status'] == 'Paid' ? $info->currency.' '.number_format($principal, 2) : null ?>
                                                            <?= $row['status'] == 'Partial' ? $info->currency.' '.number_format($principal, 2) : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $row['status'] == 'Paid' || $row['status'] == 'Partial' ? $info->currency.' '.number_format($row['p_interest'], 2) : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $row['status'] == 'Paid' || $row['status'] == 'Partial' ? $row['p_penalty'] : null ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= !empty($row['date']) ? number_format($balance, 2) : null ?>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;
                                                        endforeach ?>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                            Notes
                        </h6>
                        <p class="text-muted mb-0">
                            We really appreciate your business and if there's anything else we can do, please let us
                            know!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>