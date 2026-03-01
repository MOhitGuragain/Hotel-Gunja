@extends('layouts.app')

@section('content')

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 py-16">

    <!-- Header -->
    <div class="text-center mb-12 pt-20">
        <h1 class="text-5xl font-bold text-gray-900 mb-4">
            Gallery
        </h1>
        <p class="text-xl text-gray-600">
            Glimpse Of Events
        </p>
        
    </div>

    {{-- Exterior --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Exterior</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://lh3.googleusercontent.com/p/AF1QipPWbD5C8N0KEcaUJW_gtS7S5b3I8-YrJ0AwBciB=w253-h256-k-no" 
            onclick="openModal(this)" 
            class="w-full h-64 object-cover rounded-lg shadow cursor-pointer gallery-image">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweq9t2vv6UjuD-LaugxrLyrnnxTBAqwTI2n6M0qTYNJzXSyU4ceVGR03E71fl6750w6sW1dQ7ofEsjJy_QfkID24NY9Mn9VbybAj9AU4iQ04KTXclEf3wj0akrCE4vInq44jU5EO=w253-h142-k-no"
                onclick="openModal(this)" 
                class="w-full h-64 object-cover rounded-lg shadow cursor-pointer gallery-image">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepjatu0b5mfVqcGHH15UFVuLDYDwJCHI-HcuNcsvucBTcFXoJQUQOiTZSHtpoBIIRNmQ_MWd7nMcWYQeZW3UDPjqVmlAxOGoUf6MjUI88Lz3MD_BDJj9R3AGfQn8KW6ahvvyOxa=w253-h189-k-no" 
                class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepY7gFGPoyA2Rqw1lr_VmvlC1_Woiz3Qhze_XmG88q44rbBhsL_kYxKWlnBnS15SCCivw1CD-_1mqpl7DEsXTvtsDpML96TrWI9PoBk9z2odN3PUrtZ2e15rFUraEj_cZZTZMiQkw=w253-h189-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweolHOYq6EMXgpLrMZwE_2fVuMV8Hu3ovoaaVqN7G0Qm_rpVWgz1HWVhQ1tjqUzFEXFIchKtV7Mz1saE0pbBFQ1_y_qgXkL74CsnQbLCnMgv3TTUiL1kRbWLBcQr4sZlLGTJaqoxLg=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepjatu0b5mfVqcGHH15UFVuLDYDwJCHI-HcuNcsvucBTcFXoJQUQOiTZSHtpoBIIRNmQ_MWd7nMcWYQeZW3UDPjqVmlAxOGoUf6MjUI88Lz3MD_BDJj9R3AGfQn8KW6ahvvyOxa=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh5.googleusercontent.com/proxy/vSwAMy8lLF62zsHNG4jfblCMGReBzhcNj_BAWZ3X3M74hQYnCQrfWiMvgbmZ1_aq781L8Sg6fqNfzJEHfkE8EXqMSuGa1A70ASiqXkAL_O1pN6lYEpOpklMTOmYe8zPEQjGISZRd5-T38hD_OBxIvRqF_LVs6Q=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqB5VjQYI0q3z0pP2cTy1_PgUICFg0D6Dbj2py0qE4_qcG5GzAEFzrrFjuzS1ZZ0827QE-D07SM7ugXF_mV55QPFGA_VEGYRNK9SSkiDpsxBLJWaZANRqxyBHGgL_jm9njpJfcG=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqpqGND2vH6P6dKLwd9OFJkPtY6gOcSyDVc5UBD1C-mlbHJV5fePZFDfJg3cZq6xwe0o6m441PsvsGe1yfP0FHuThEs9AJIM2FaCy4ZAnqJ7FcC0MI6_JM90_vBr-msjqLpgnwH=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweonz82X81TM1-6cpxF3yEwfWkBKSBggNCMPOmbUfRU2bJTNjMuw2cwWGm1wlXv-Wif-FPfYkzcI9CmuPAPnmS8t9CvRrWqTaFpEmqGSO9cZhgg9-UQ4mwuntgXLD8dRuWTtXJXCKw=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqUSvrWRm2L90sADKiy_IWepyEx7IzX-h_H1febH9Q_XEOMFFdpM-cPBC0DBBGJK1Z1nFSm-GbnZpBBfoVUdc5ozJu4oFx2v3puPNTBzipZg5wOzW4bRHu4REmnfm-1gNbr713r=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAwerSyhixH0qSlZ1e51N_5Aq-3TohF78j0Hm1YskxEGDYnY_fqgU0UGP6ZoD-98Ra1Xy8xjtvxFox-KKHYqactcynz5HqXRPFjS4fIvWLu38W0eIWqru2zN8VBIsqnGwRf5YI_k0Kyg=w253-h168-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}
            
            
        </div>
    </div>

    {{-- Interior --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Interior</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqPA7C-xk-HKlYBi4sEpjyBkA3KRiAG1O3mn0zEOQk_tGkwWYdBmlPpWgy9IE1NnJKopGsiBZCjq6ewg02vTvpsHrV3aAkXSFaZe4Qr9G8gqs99Ea6czv1ELtMYSvf9P8A2qgb7=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqN6BCd5ZYWWrOrYLiOFyVnzKxZ7q6Eas7whgTkwZSiHg6r7JOK-XDQ8p_13Ka9RPvqKcjpTovp2ZdIcm5QW5dmi4MhiPK5TKFjBvyYViJ7EuH3zM48Zefm-xOWCYwYPf_6T7Sa=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweo9n6AZbPIgYiJWfh-e-ekHcgSgBGuAbl6oh3pYWkZC_95wwXICR7aTE_reSD6nV-FwBdN7I-ke4LihkMJZacjgK2FKh59FcLu_FX1KjLSFxX3-QpEknChB8DaYdasRIal8lXxgzA=w253-h116-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqAEH_dKohgIJ2K0emB4hW0wKzEfzP_oJ9BxvGUkX6bHTdqKFI6FD4ln8D1m703E2sRprejO6UxlTtnqcUrmnhjJsoTCZ1Rfiyko04MAdsVAlT2yl2IY9XeKOBx4H6dQi5xQTWg=w253-h142-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAwep-E1CB5qypMg3nlEHapeCor0Dn2e7XbCoB6T8PcxErqNdaC_7uHEGuWGhvkzbEeN7jRjfdmMEPHxUEDRBnLvTDBKZv6MGxJXGfed93EXgxFsPxJUG7C9zbATtuO1su3huypikNUg=w253-h116-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqyQ4SVwRIAlLxuNyehmcgLQAoK1_VwHjyHw4XjfgANZzjguddgoQADH-RDg_ONpfEMSfi-Xoojl2vVXTsPhfNjrRnurpbKaMkaZ9Tgs9ALagB8rFbO_4gy_4-kYPkR5rpvdpr8=w253-h116-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoUvOp8ri5NPJhr0qtCf4zAVrIMiCXsm_IZLFtQUe1gp4ftU5xYI76rvQ27X597xTgvd01MkkgrWwjJfOEMMvMtDDCdiAKzRikRjsWKIzZ_cwiQtLh9AhDkAo7Pa1sR8usJ34Fx=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwereF9kuqtL4shhen4aduTw6Apl-7MLqDbYwubc3A3vFSKg2T63Bj9mmgcQry_j49UEd2YZIbxiDFfLqzXe3s4wnxU5gqVyDIpGZGmIyj2hWDlrdKBNtfOMYYZ6m48D9TsCp-Os=w253-h126-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweq-VsoEIIai0MOymVckcCsNdj7y10F2E6jwWMAt3j0EYnZHaves0LTnv9UflWImarQzVjOugz-Fgf3lIOX55YDRfNW1pZ70z5h0lFEsEtiY7uv0WENrfnR0H9jmm8mMCpzqWKa3pyXbn7tV=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepKX3erGsAtaKeKmBf14Qnr0MeokpMc_MuzkenPuVn3avnx3CK2uRpYbXwnPwgqP4ZcXsKctDcfhuj210CFSbYNbtgv6HfqL24H2GwTvctenb-kxUtGwKiHBG4EwdSKYtAvjVST=w253-h142-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqN67sfYIswjcsMAJQrGUf-nY0nVZZGOlMWYSldcfxhBbPEYgL_wrCEA_PLJC8wz_tmqxrqdFa5j0nas7gdiqTzJhwLanj9_6gM7sCxvby41Di1w02ayRNSxhCTo2y1mHyrEZXYwoN0kb18=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweo2zd86Un122Hp3-25bpQM7vAuU6JYQL9-a719sT3RS6z2tZKfjYozHaP_GfNtAuXYbTxP_QKSYOHXQ6nfBdn-UYFJ9rc2gwnDJnRURz5n7FdWdUcZVmoZimzX9_bo9GfJy4-FE5sxotNTI=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepqCsRmpiwX42Cog9apgFENs8QBJGyDlHPt4jC9dSw-acbwoTnOEbQT-zf2Ws2ctL7iPKlJ8ZPWygjsSLh1EwvTjb_gcZMZvHfuEdK5gzoGA0PaPopexuec6m77vmbV3I-gCWHjlA=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweotItM2If4L-20IcIDTCi0_YpLNH9fcsn3wDmNVmayQ8NgApapTlihy7Q0Nfb3_HGf6eA7WDE0RvttCSK_8T7KYFYEAgL3Hl-fTthAizmo7D8nUZXw68OgqSyms0ReUPgxOHtWdcg=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/proxy/fWWGg-hSb7uGJkcsLRCZRJzdRIcW_ab1VNZAPud_JJQH80QIVppXeGfWWD8HL0b_Ag_h3o-bNP4efDxUJL4N7Stq1Gt3Sm1I-8ydQEIpbLxRihFtS0Pmu8QPM15KB-6biHnQPEX2AF9HNmyGIvVdZ7jqQ3aLzg=w253-h168-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepqTAhWCJ_nBOmUFwUE23XTvpQaudjclsyTHV9zNoCDV_8O_US7Im1zXTVMU9E71Gauico2Fi_WQzqlPagVdgjy_uqLahVj876v3Os7lKXT1AmOriHxuLArTJIKDGm2c1ohBvlsPA=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}
            
            
        </div>
    </div>

    {{-- Amenities --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Amenities</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAweolHOYq6EMXgpLrMZwE_2fVuMV8Hu3ovoaaVqN7G0Qm_rpVWgz1HWVhQ1tjqUzFEXFIchKtV7Mz1saE0pbBFQ1_y_qgXkL74CsnQbLCnMgv3TTUiL1kRbWLBcQr4sZlLGTJaqoxLg=w253-h189-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepLR6KJdZptbV1jGx4LWtQNLO334aiV6rMt11VtrmR9ZnaGd6-y8dSOBeYubKiIdNcSnl6NQPV1OHjDFAZx1xmeZUyqBU7Q2zq-2j6cNcwj7t_W-e2E-bR74xlhRT0WegKKnqF8=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqUSvrWRm2L90sADKiy_IWepyEx7IzX-h_H1febH9Q_XEOMFFdpM-cPBC0DBBGJK1Z1nFSm-GbnZpBBfoVUdc5ozJu4oFx2v3puPNTBzipZg5wOzW4bRHu4REmnfm-1gNbr713r=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweps482r6ggVAGbUvGQncDtH6V33loz-60Jbp-aI1USEYatU-m94a2o54ZHOfUgPnQqFWO92qVlUtOlPW38CdUpW-JQjwBcYkTtPs1pnmlebc32CRbjxdK6rkdfLgFDcEt52YMmNQMdvLaFi=w253-h114-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqpqGND2vH6P6dKLwd9OFJkPtY6gOcSyDVc5UBD1C-mlbHJV5fePZFDfJg3cZq6xwe0o6m441PsvsGe1yfP0FHuThEs9AJIM2FaCy4ZAnqJ7FcC0MI6_JM90_vBr-msjqLpgnwH=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}
            
        </div>
    </div>


    {{-- Restaurant & Dining --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Restaurant & Dining</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            {{-- <img src="/images/Restaurant&Dining1.jpg" class="rounded-lg shadow">
            <img src="/images/Restaurant&Dining2.jpg" class="rounded-lg shadow">
            <img src="/images/Restaurant&Dining3.jpg" class="rounded-lg shadow">
            <img src="/images/Restaurant&Dining4.jpg" class="rounded-lg shadow"> --}}

            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAweqPA7C-xk-HKlYBi4sEpjyBkA3KRiAG1O3mn0zEOQk_tGkwWYdBmlPpWgy9IE1NnJKopGsiBZCjq6ewg02vTvpsHrV3aAkXSFaZe4Qr9G8gqs99Ea6czv1ELtMYSvf9P8A2qgb7=w253-h189-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqN6BCd5ZYWWrOrYLiOFyVnzKxZ7q6Eas7whgTkwZSiHg6r7JOK-XDQ8p_13Ka9RPvqKcjpTovp2ZdIcm5QW5dmi4MhiPK5TKFjBvyYViJ7EuH3zM48Zefm-xOWCYwYPf_6T7Sa=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqbozp-IBsYNOO6KacaLkAstqOs3-LVY_6gSBOyrlM_jPCBfPm4APSU21SQEEVmIMLR9Aau5M0aHoP0FhmBTJMleRa25g-DulZcEfV0AFFhq8CII7fLOwWAMzz2ykehJNtjSBA=w253-h168-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepqS1G3EgTNlEyjuevse5w8ofGsKavbWt-dGeVTOPAJZj0rVQpQKPHaqGEaCRUQq5dB_laQ5re4Fbv4L3u6nY7L32oJtjy1cyDpMQmTtIedRpG9GKrbJDkZRyOzcGzHBCRwk9kZPg=w253-h142-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqN67sfYIswjcsMAJQrGUf-nY0nVZZGOlMWYSldcfxhBbPEYgL_wrCEA_PLJC8wz_tmqxrqdFa5j0nas7gdiqTzJhwLanj9_6gM7sCxvby41Di1w02ayRNSxhCTo2y1mHyrEZXYwoN0kb18=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerfS71I9b5NQCjl0CYTWE-SSK94hjmGazVryrI6o-sg8fMQPna9ByLKuKy47H0AruAl8e76GHvtuAhTA1SKDUICQrZVfNEt-fHMt5HOtQNDMsTiah78O8zEoskqVE4s9drKGy3D=w253-h116-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoolm0_c1jMMde2vMT34ZjrmLIktf_DlCMcYPPSX3fle61qhapm7rmHflnNhdbYBQrkY27iv-qaxHHPjAaWj6Vk76mLe4oOhvrjNS3ez6Fgd-nYtlbA4ExOho1KnH_wQXdFqjjJ=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoUvOp8ri5NPJhr0qtCf4zAVrIMiCXsm_IZLFtQUe1gp4ftU5xYI76rvQ27X597xTgvd01MkkgrWwjJfOEMMvMtDDCdiAKzRikRjsWKIzZ_cwiQtLh9AhDkAo7Pa1sR8usJ34Fx=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqAEH_dKohgIJ2K0emB4hW0wKzEfzP_oJ9BxvGUkX6bHTdqKFI6FD4ln8D1m703E2sRprejO6UxlTtnqcUrmnhjJsoTCZ1Rfiyko04MAdsVAlT2yl2IY9XeKOBx4H6dQi5xQTWg=w253-h142-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer21xQZJ8txMQijvbfNYHtAHbE5NtRT6iPOuTOdG6NfEKhUXZDKZbooC4KE6CEzY0dyrykT7LlbPLmDaUuhFo5RJ-eHP4b7OE4KcBPBBNkjvIVMKPmaCjFo7yKleleAcwhJaU4=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoTBIOFtDvgPL72sdAPhHd6h9nqOq5Aj5WGcoM_q6k6yv82EBtF2ygWSjjxKGawa5EpUsnABfSjjGYSJHwe4rXwYO9wklsdp7nQL8wqlviIPKapzvmwkzbAhRFjcD9ao870DOl9ah6MDIvL=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAweq_k9jGJaxwwP6DVI3FwCC1W4d-7cck3ywODDoKANh_TNIcSHVDITx4xaa1YE60IBapj_dGERWD-YfWEes8MnAEdPHP1WZolMt4rdzFOgKulL1TOhjd0-7pHI5_dEq7qMmJ5vM=w253-h337-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}



        </div>
    </div>


    {{-- Event Hall --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Event Hall</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            {{-- <img src="/images/eventhall1.jpg" class="rounded-lg shadow">
            <img src="/images/eventhall2.jpg" class="rounded-lg shadow">
            <img src="/images/eventhall3.jpg" class="rounded-lg shadow">
            <img src="/images/eventhall4.jpg" class="rounded-lg shadow"> --}}
            
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep2bcy2c1W5Ko7fYvTwLRZyyV3QCV1DuaLWIlnpm5LZhq9HwoNYiXlf7ez6ZNeYHx5XK7u13cPze3aHE8KFVFqa7V3en7x-7JtJ79CVx_zH7mxkf_SiaigysIZzBJQecfZnyh1U=w253-h189-k-no" class="rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepAHiwMci3giqhbBgTQLK3q-BXAtSRzgs0P0tMf42YHiS0kG7EhEJ5eLBUz560415rOllvx3405gcGEjA4y6DzlKAQhiEOkMjoyw7uHriCpCiLmL3Lp-Esom_wmS0C97SOjYngu=w253-h141-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqey1B1R-V3q9SrrXqXF0A2XWocfAxe9Zeps2l_1fZqD46d0Hs_DtX4I6FLxFcX7PRSE888-mPOVj3_6sy5qjFbu06bN6gGRZqqjTlzZmhpMbVyvqqBIac1lJ2oW8YBBxCF8oXV=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweodAAKv2m7_Q7R5mgDWY33yyrrWSGjlW9mEsAgCvheWNRMYnc1HyrEVc1NZOGBSYtn7SZI24F9XrBL7T1PBgFjSlSkI8s_9FV6Z4WJ1f9ttBuk1fNLmqpal-PB2D4UQCCQPtZiY=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoRH72or203nynPZrxUnjLfJliesnV1aCGt0mCu1dz1dW_ZhyOURQ5txc7hX3uP0_vj5PLW3-7NrOZzy5gsLZlVXQaKBrvxiEkOVraIp8eUiYJfvnbQs9f52x2Gkvx0h1GnwNE=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}


        </div>
    </div>


    {{-- Cabin Hall
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Cabin</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="/images/cabinhall1.jpg" class="rounded-lg shadow">
            <img src="/images/cabinhall2.jpg" class="rounded-lg shadow">
            <img src="/images/cabinhall3.jpg" class="rounded-lg shadow">
            <img src="/images/cabinhall4.jpg" class="rounded-lg shadow">
        </div>
    </div> --}}
    
    {{-- Food & Drink --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Food & Drink</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqgeUVc4qWbGz5zdtxA_mBOIRjMHWWUYw6M1J2D362sRe0Y5mQ3Vb_OnSD3TkS-A7IRvH0Qpv5cLhKL1gTaxVk2mLP3lPwR_VNKHqclIFrmU6qZZhwPbzUbACp4g3IM0QnpotJ_GQ=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqQYE81Hr8ffhcReXPC8L1mViR_c_8CV92kVI9CORmPMb1-zSD360aJIBSU9ryoKIe5uTY3Gnx656LUXU7ErY7BFgMQ9Ko0PnUWHgP5y9E-u9xf3jE66iq18rwAbLoyO6didOqw=w253-h253-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoH5HoBVkrQCwgteft9dVtmHNmKjDKcxSX9mtSG-Ph617ktvnKYjWmbDvJCnU_jMxIxaA_P62zfv905pPyv2nfoEg_ucmZYuAvtALUzQ_PFqV-XD8PRh7iw0-MkSlX3_Jfz3g9M=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep3PWtdqEgZOSh8Ag-a5n1SP7wkXN4KfnlJKlal9EYryDzl254Da1lxLzHbZDHYnvZsgCt3Is9lu1arAFoly3xivs77VGHhM1jVZFHSI9zjdRKUcaYM6m8yb0WKLIEAJr4dZpGV=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerZYXGSJ7Xdnd4efkW7zInM8LOdYc-42wWqMVK0HCt2os6DZwpAyrtpsO18TR0e3uBrjFrYwFfvidWUcK4Lr5x3uu6bd__y27TZEzVwsDCi4udM5riWvt4lmBShQ7nxDWF35koF=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqkkH_l9u6Z1iKKD_wRNFMQlyndLl4bLSyW6pHKqIxAyj38hBlqNNMMGNmFN0IGbkTy8yKEHWZmzX2GGeb76e2yTMOcBAfix4C1v0L2ujTc-CbI11o5tBVbU2Ds50q40pn6B0U=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoZIOnDj9BkoaSSiNTdXRske7vrYe9Vl3ZUtDxkZW7biaTaLiAfWTqYRY12vjXGzUpx70rN3KvhGA4-A0GL7WTiZESJB1odcQ8ZGHd2wFPyNQVzADpSLODusmXZu0sO_p_WDa0=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoX1txpVYOgoa0qbxFtTIcTHMpQZyTz_DyEtItruKIQcSCL9IwjBUtDioyvt2FU8Iu5xoUY0UVWIKy1VFeY8RsM3SwcFcwJ2AnoTn9B8LRNcCm0eWXaxV_1jPEYGHObfH9PRW0=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepuqpoQt-IUSIdSMr8ZHKx7T6zYZ9A5Fk462m0eIkP9yKRK0F3DpvE4YDsQltl8Rx47Z5kgQXXkuEg1IuS8JrN-Xw1aMsTVKK3CfTHTWS8hgVm9h-p1_t-eoghdM7vE56BjG_eXTg=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoE5Iai08PTz-5z0Fc8i6BRZLXSnVat8zPTqXmb4UJS8zTVzfRlyCcoEiKTbh7h8WPFtsCnVLKTqnAzzOd0L05LvV-d6iFM8aJAvni-CdxOmq9fQZiAwSgmt6dl6mjj4wikiDTWrw=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqfTWjh4EwsZ3MflMqUXwj-poBlu7vNlqjzxC7XEIiO0ukvCBQnT3PuYvs1jRWzFhIR9Z-qpE0feSx2QwCdZVBr9nPVBSRLNXDQfrcmoLpLMleB3D2UHIY70iYKcs9q3jPM8ldW=w253-h253-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepSlUbqYLDZCLo7o7dFL8yVdUlXVSntTOSt117yD6dzQCN-gvHSJt8zkNgVjRPximRlakxJxS1Tdiv0z00Mw4CE2hyv4Kvd6QJ1_xb68NQ1uxFyWFPa7JxeUCeLw_P_zICQBwjokQ=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqYbYp29lHVWokpLnDQgX_gS5rBHxxEYrvjH10IJfVpKCHTdJFHBxk0ORrU7Q6YYTSu7fPAc2gVx9m6SkYWR1DApzxrFXunlWu-uI8qZLwXvTE9A4EBtBSOc51r6qENreO6OJ1jLQ=w253-h253-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerpUcbi35tEgZrFn-tIy1rKV9JxenhlWQR7aUrfMT0BKovuiGTEUVmuWEXhQr01XBTRAFyK4tQ7ZkhLQMPTjLj0a8lwEINF_jcIXWSlYnwnzlpcQ9VhEiSwcdneV1ZZZPs968mpWQ=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoRZp2mN-TK5Si0V3CZod4Ndqe8P16RtvQilTh6df1I1b-4fMSbbAMECeqyUueoYBy8PlwaZ0XGi74TX1Cf4Gi6s82cX3p6sa63RpZaBSKOgBus7dC8IOWjAEWHPKC7seVr9Khm=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer1MjT6azeyMF45hRENEYLGosF2XHcm1_o9Jg7k9PaVqsX8cDfABbBcK75SPdT1jO1wLvveB8UWahf47OxBm3DEiY67Ypk1xYYmQkZZcoFRyJruzWWErKIkVdDT3SdV5HEJcOF1=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoMbZPnYSLFIeyLRexO2B7LOqHPJLJybzQT9uwbe9x1RHD5cJVn0taRTgtaCdlo-5rv3RiqoExG45LmBghC-v7l4ljdjlCthTMTgxBJT_qXguc5bWrnxeCcDeE_KyUWRl9MDwI9Lg=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerPYoWuz1DPJaV_DnPaw4C8HRF596FNwx8JTCaGUMrhvfeHKIYgfSaLt9v2xs3JWV7h2tCk8sit7jIsIFZfdwfv27bByAM0Lfg5PinGzzgWA_3m0Sd676GCR9fvsNvZKb0cQKZg7Q=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweq3_RiFF038SqzCh39gw1LgerDsTQsfMAzvWUK0RcwtJVV9T-bGPgBe_MMaRlm7GVcXbpT2WnuJEaf5igNJfd8s0jYfQG1nhZrxv2aJAg8tDr7VA2A1C_k6H2Zq_M9fZEUwVqxzbQ=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerBd1gyS67jO0OOLCk1vw7JkUzfOuQAm6jvMuqklUj7NoOjLAvk8oUe7U5sAwkcZT0SJmuknMhnAeRpt8o9hCpDh5ITKrdzEN4jeSuwc-59H4VLsb1HFRWhqTR8oah49Mf8XUXq=w253-h559-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAwerqSMqz79SLKwP0Iuva8sgerGHnR11wJJpH9rF_xKKmjKGV6gn7OFVo1XqktF43hV1ij-DtIGLmKewVxqaoYyHmgmM3ZJk3X94EWxwErOdTFVK1op3D0RsJxkUZuPWUfW2MeYxb=w253-h189-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweq4-Q6kQAi9-HjCuOoQi1HXFBZ4ZsGLlgvBY2o01YYAfzDpWe3YTGDm_FSCo6OpXiJHGpLuVVblIXqAqK3pYvpYGgi0VyxlhPHRsTMiddflMpUesX4XH0sTV67qajXs8XTjiz-0=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqvT-mBYPQjJ8A29n_0il1F0aZBK-swzajI05T6TzrS_jtb1_oWz-JCIE0ErdPcuixvq10OhLjrLX6FTrckClf3gii2DbutagzBt0CyC4lMxJxgE4G7oU36wKlNIJGUdlCAGow=w253-h336-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer64xrkoJ-DZLgdWC48x6AgJnpS25Tg1QGEJsPLLLzYDwwLIP8ZY9t5T1gA_XRanubKM_d1vPgIyAe9Tch0As5H_i1mUqX7IRlYAtXoaG9EF6PfexxaOZz-UVTd3pp_DD5Cp3zPHQ=w253-h559-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqjfB03kPbDmUJ0CPseguqDKrwYZHCjimmJWatzsoRWHrek4CYQWhA-9eRzh5vL4LapjPWuN7DmWjCaDDKs4CxWpoDprMJevrzndzXsEseCpH8a2J972RGreNb3T2sIVt6n48bI=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep1kcNIJ8tub66HFM1Dn2Gq-a7jtdSH6br3Ab16-GuoHXWHN7qrore3nMCl4NpKkaG6346krVG1WBXe7P4B6rynBYgZCbYzN2MkUW5NXT7id2OmmJFlSWZmBgtvbdwIOXg-juxm=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweq_NDGIR0jLJI0Di9UMB6w7e_G86vD46B2pRg1_ExESyx58Fm-yk5bnRflVZPzUeC0bJS-aYmio8wal8EFoWsGJAJmbCIVBGAPKcC4-Aeym4qGFPYOUw83KGHwbXwMDW6faYfk=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweryFL-mhyAt_smAiUhafSpSkDPm3ZvcPlNGsaZLXs5IlXtzF7Yri21hsAko5e44Sh_BVxCOolehyZee6uEXBOCgt-tapxfxsELwdAayF-jWeR0y7lHYwZqwTnAQjFSZH3auq1An=w253-h548-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoE5Iai08PTz-5z0Fc8i6BRZLXSnVat8zPTqXmb4UJS8zTVzfRlyCcoEiKTbh7h8WPFtsCnVLKTqnAzzOd0L05LvV-d6iFM8aJAvni-CdxOmq9fQZiAwSgmt6dl6mjj4wikiDTWrw=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAweoZIOnDj9BkoaSSiNTdXRske7vrYe9Vl3ZUtDxkZW7biaTaLiAfWTqYRY12vjXGzUpx70rN3KvhGA4-A0GL7WTiZESJB1odcQ8ZGHd2wFPyNQVzADpSLODusmXZu0sO_p_WDa0=w253-h337-k-no" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoX1txpVYOgoa0qbxFtTIcTHMpQZyTz_DyEtItruKIQcSCL9IwjBUtDioyvt2FU8Iu5xoUY0UVWIKy1VFeY8RsM3SwcFcwJ2AnoTn9B8LRNcCm0eWXaxV_1jPEYGHObfH9PRW0=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://lh3.googleusercontent.com/gps-cs-s/AHVAweoH5HoBVkrQCwgteft9dVtmHNmKjDKcxSX9mtSG-Ph617ktvnKYjWmbDvJCnU_jMxIxaA_P62zfv905pPyv2nfoEg_ucmZYuAvtALUzQ_PFqV-XD8PRh7iw0-MkSlX3_Jfz3g9M=w253-h189-k-no" class="w-full h-64 object-cover rounded-lg shadow">
    
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweouu-lBO84hf2abKfEgdpZ9RFtBA2w59sWRidGbaMswhFvQdmPtN1bDVHFJoyYryp_K6QPJJQK9Gu2-XS1KIGE5sXOlKW_hCEMsZ1ZOhsasiG6jJAasNGu6dIG6Mp3Tqo6GDMNj=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoolm0_c1jMMde2vMT34ZjrmLIktf_DlCMcYPPSX3fle61qhapm7rmHflnNhdbYBQrkY27iv-qaxHHPjAaWj6Vk76mLe4oOhvrjNS3ez6Fgd-nYtlbA4ExOho1KnH_wQXdFqjjJ=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer21xQZJ8txMQijvbfNYHtAHbE5NtRT6iPOuTOdG6NfEKhUXZDKZbooC4KE6CEzY0dyrykT7LlbPLmDaUuhFo5RJ-eHP4b7OE4KcBPBBNkjvIVMKPmaCjFo7yKleleAcwhJaU4=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
        </div>
    </div>

    {{-- Bedroom --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Bedroom</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://lh6.googleusercontent.com/proxy/tL1x_PaG22edMWtVGXEbLf7WC92obN-7qf4Q5b4uLVub20NSfDhSBdcOB9HA4W5Gp3z9DnCt8x1JVXKn6ZU6aTy1nL75JPZ9LxLuA-nAMnEXfmH4t4ITLHsIcrYsZy-UDQoz_FYSgpjEhiTzYIeNB1C8U9RIEw=w253-h168-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/p/AF1QipO8K6apMM0wp8C9iAShjN6uTvGHwyhqwqDjTPuP=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoArFQ3tlnc7wUyhFNN5WEGYYHoxLquGMvLt0wam7ANmyXIGWxY1Tbfa7YM2xrBB8R6DA3ZB_2Fl2bUtTaC-LAumqF6HdqS0vnZ95vtDEjuQwVAXPbhTpi8ysdtZA9tsg76v3w=w253-h142-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoY6GRYLuAY3IYX3kDssy2YXiAVIgfiBd5yCmSnhOEDdiZQkwO56aobaqYB8w9IUbE-5QslwQ9QdnFy-OdhjqEf2bLNwsZzn5AEQBvIdxl7bVLiR72pmpsJzmnlB4iDaVczFiaF_w=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep29QCCCI7ZSBZHFvPKp7QV9N59jCskqZqdzO__DPuBWN0QtLA6KnUCBYZNYvE1l_cviz9qAalkxSAwTYY2__5qlHLSYy_0SLiuI5wNeJhgenfx7tnLl2KLt0mFybAwBaOh4anpug=w253-h449-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoWGnzioPmsgUEIUn89CX-HNw-3l4C3OHcxpECQ4dBsUwvXbJDKzc6hD6WPC0DPdqqAo3zg1xcGWq4lDWZPe81vZ-IhbsQffds5ZCUS9zhVTgW6LZA1o_3r21OkcoY0f-JfzaE06Q=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerWjbv289GVPeUdQ4YmX0eNrL0j0VKv2j-o0cvjP79n1LZy2awL1mxmePx6LNg5mqbdi_l6Lb8lSfoSaWXUyf6oLX2_6yKcRb_E-60qDJqfFeweBUD8qvUwYtRgwBac6ODuN9kF=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerO63UdSKFq3GklCtYCV7hBc5Eom5JJML4DFtc23r_CwLR3PAdvu2lrgZOMC59BxNjnsUjTMTisKo67hXevgRW9qQW9c6YTC6FKzaFMTgC8LJBWN6PnncviWFb16BSbaRr6LE-L=w253-h113-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepgeCoRePTDTVUHe5tNhk9KAiosvZTSHG6H3OXHdSBWjlLt0PCq2AoQdI63Xt0txLg6m-3Jdem9BfX6DGqNBgU387DqgQ-MDCeEOPeX6Uu2qXr0BgZM2SUUo4OVNIAKA79AikM=w253-h126-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweq-cwJuVTidnxwrQFihCjaG19p0DS0EYO1noBhDVOj_S2f6Hqgh4VTpAh947fu2K7rQrQWAal56A7YRQy9_oaA5rjAf-ZDHxCt8sKY7ZQZ0PJ4wqaaiX3RzYHv-9Wc70Qki77J_=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweqTRrz_tctH3q97vje5tggNQIZcw_rV0wtV2q2E7SZaQBjAfLxUnJbhjrMMCoNZGKozL0oW7kNMXR_E4MR_E3quzxlaEw4VleDuPsgYf3EUEtUCAkEBOOlS2WHnJd43_NlSwhw=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer-MzZ2FDyR74a2DjuKq1UTBU23Q8OSr9ADDraM5F6Zge7KeL5oelUXw2BH1UcI4BtAaQn_0mpSyQ8MaqGOJ1TNFj7uI71Ru6KZw0n0yl0thSuze2yU7Do_02Xd1BvaSkB3JkAw=w253-h113-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoWGnzioPmsgUEIUn89CX-HNw-3l4C3OHcxpECQ4dBsUwvXbJDKzc6hD6WPC0DPdqqAo3zg1xcGWq4lDWZPe81vZ-IhbsQffds5ZCUS9zhVTgW6LZA1o_3r21OkcoY0f-JfzaE06Q=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoY6GRYLuAY3IYX3kDssy2YXiAVIgfiBd5yCmSnhOEDdiZQkwO56aobaqYB8w9IUbE-5QslwQ9QdnFy-OdhjqEf2bLNwsZzn5AEQBvIdxl7bVLiR72pmpsJzmnlB4iDaVczFiaF_w=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepP_AvB5gDNE0Bobrm-RgHt1LE1Oj-qKwChZ5mmMRUFl4hdsc7U3MkrJv-wWd2507EGE6HFuiTn1-kM4SH88zocOM2nS5lcyqImwoZfdyqpd3C-YzB4g89lqY4YXrtnteyjVkWdZgddZtg=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}} --}}
            


        </div>
    </div>


    {{-- Washroom --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Washroom</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepwjIpIRRhQMmWfi0yJ-uXhmEX6VCgzepeT-MfJVzYpM2KKxcnk-MqDZctkOLbF2sZWLce5kZBKXVHi1midPNlxT-bYvhJ1qz832lpqQEYoX6Fe6NbG8Cb6qg34ohaWjxPq_1CA=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer2xxihNMg22U97wgkaI_tWrS5Si4Bvsd_swNTVbmQZbjYL-NaEN9hZAqhFU0Mf1DJ4gS4T2mwh3nQiiGE4EZ2hrfk19C8wTI_Uhn5J17pbrEFuE3HCXmWSNyF8q0p2J6G8lTHDUg=w253-h126-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep_Tjlq-lw6GBhGlAR0AAHj9hJ1DWw4Y6U8uybplwAErONcPmJs5PAcFYSL9SXcGfNcSQR4k-eil75DzLnQZM2FlF6wjIUmw_ahW8M9mDbOraO2uAX4TtUMrZw6GlhN4qrbpBg9=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer_oddI7jHfS8fe3jOVaHEAhIpDJcq_2JgdCDRgzL3K84pBIy-pS27mEXe9tpMmJiwdrBtbHrvUsFfnnnBVZIuNQeDgOc_8lJ1wLqI8KAUFZgvUxaZHMJdktD8jrqJ_ymrLfqk=w253-h189-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwer5CEsvuJYHQX2OwgwE_SdDjbam2lAU2Eife-Lu5SLrR0Olbr1HAGBc1YqYzgGjSepzDUjY5loLzTFLXWTUyZnjAzod4FtcrySYm1zZy-eflCurF7lLQi7wPFJKcb473fjMINLH=w253-h126-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}
            
            <img src="/images/bathroom4.jpg" class="rounded-lg shadow">
        </div>
    </div>


{{-- Celebrities Gallery --}} 
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Celebrities Gallery</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            {{-- <img src=" " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" " class="w-full h-64 object-cover rounded-lg shadow"> --}}


            @foreach($celebrityImages as $image)
                <img src="{{ asset('storage/'.$image->image_path) }}"
                    class="w-full h-64 object-cover rounded-lg shadow">
            @endforeach

        </div>
    </div>

    {{-- Guest Gallery --}}
    <div class="mb-16">
        <h2 class="text-2xl font-light mb-2">Guest Gallery</h2>
        <div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <img src="https://scontent.fktm21-2.fna.fbcdn.net/v/t39.30808-6/629933562_1504787981173928_1955719413055060303_n.jpg?stp=c0.225.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=106&ccb=1-7&_nc_sid=a934a8&_nc_ohc=TZfOKKvYCS0Q7kNvwF-c7lr&_nc_oc=AdkWM0d2EUqMwdP6SVFg9EU_jZY-Av_bn2TVRI4db8gdjNzODATWEsmElQZbjW8rtoGlpmd4N9CTPM5_4ZxkH4Nn&_nc_zt=23&_nc_ht=scontent.fktm21-2.fna&_nc_gid=YziH2VsZ_4WxUCMt26oqTg&oh=00_AfsiaXmcYBOrdB0TrNLG96P72bttqIYWSJieuifa5ECeGQ&oe=69A6F60A " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://scontent.fktm21-2.fna.fbcdn.net/v/t39.30808-6/615885386_1484890149830378_7514625782350908678_n.jpg?stp=c342.0.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=103&ccb=1-7&_nc_sid=507b6b&_nc_ohc=bvO5yVvKrYAQ7kNvwEPThvA&_nc_oc=AdnAnMwBdU1v9SvVmgATH39qyA8Vs4exsDl6Jo_h3tEvGWoXwmhwAApl7gk4ddE2YLZnThFVqrlnf2xc9-Jtgc3C&_nc_zt=23&_nc_ht=scontent.fktm21-2.fna&_nc_gid=vr0bIgxgPmSsyyVHc0tzxQ&oh=00_AfvXsXy7RpyYQTBxoP2OKkrujtm6p1YfbFhsmuom6pmU_w&oe=69A6FA3D " class="w-full h-64 object-cover rounded-lg shadow">

            
            <img src="https://scontent.fktm21-1.fna.fbcdn.net/v/t39.30808-6/640443692_1515723120080414_5993341623173345945_n.jpg?stp=c0.225.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=111&ccb=1-7&_nc_sid=a934a8&_nc_ohc=3IjOfuj-cqsQ7kNvwFunoC5&_nc_oc=Adk6AzW2uIfVv7SdJbaOQq4tIUi7hegyfj2fQu5lYGFMdZUp6aicnRjTbVP4raHPUpv9wVgRn-N7QCI8B0aXF63h&_nc_zt=23&_nc_ht=scontent.fktm21-1.fna&_nc_gid=crgFT_132P6uQAw_47VuWw&oh=00_AfuZyOXe_sVKyuvZjTEKu5w-3VpNHMG4a-e3hlhQSN5fUg&oe=69A6E388 " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://scontent.fktm21-2.fna.fbcdn.net/v/t39.30808-6/639563841_1515723626747030_6557704193071119015_n.jpg?stp=c0.225.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=100&ccb=1-7&_nc_sid=a934a8&_nc_ohc=fh3xWbSe-mAQ7kNvwHYGb4m&_nc_oc=AdlRYaCoGPNt0pQ9VfLG8vlLjHoaPfauTATpFjm8CPTi9Zv1fCMZuiAdzpl-JlIcnGAU2vMQqVAI3fX9tMZnHp0I&_nc_zt=23&_nc_ht=scontent.fktm21-2.fna&_nc_gid=aZEsO883GUy1OQxBH-qIXQ&oh=00_AfvR2NYB_bKMn9L87V2wl57wxZJaxHXcepHNM9-EjP6e6A&oe=69A6E057 " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://scontent.fktm21-2.fna.fbcdn.net/v/t39.30808-6/636842036_1515723740080352_2175574052778419922_n.jpg?stp=c0.225.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=103&ccb=1-7&_nc_sid=a934a8&_nc_ohc=NHVAMq0p644Q7kNvwFPK0am&_nc_oc=AdnTTOu1EUDvQDYUodg2WWAE5T7Buz3yw6poQHbWVzSrlagc89j7fL96cZm-WVQJrB_ADvi_lRu9SkarXaRSRxGy&_nc_zt=23&_nc_ht=scontent.fktm21-2.fna&_nc_gid=aZEsO883GUy1OQxBH-qIXQ&oh=00_AfvB4n_LO4DSOPHB7wMm1iRHwV7QftPrP-yhnAOI2gephA&oe=69A70942" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://scontent.fktm21-2.fna.fbcdn.net/v/t39.30808-6/640152112_1516636733322386_5067789640140543747_n.jpg?stp=c342.0.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=105&ccb=1-7&_nc_sid=507b6b&_nc_ohc=v-lB9sC901IQ7kNvwGMdc7t&_nc_oc=AdnK1qmYxIR3WliMGTTjujlPnGKUuudDPCKREa22eIc-ZJtPJr_50Z_iP2yw6W0fOYNMI3ruf-nBaWdAfkB-z8s5&_nc_zt=23&_nc_ht=scontent.fktm21-2.fna&_nc_gid=bWyS50xqxE5Tt3OQ3JS0sg&oh=00_AfsBbaTqYnMEXUFhjQueEfXecG0xKE4l95RJU5N00Va8CQ&oe=69A6FE92 " class="w-full h-64 object-cover rounded-lg shadow">
            <img src=" https://scontent.fktm21-1.fna.fbcdn.net/v/t39.30808-6/638269264_1516639779988748_8125741466820592419_n.jpg?stp=c342.0.1365.1365a_dst-jpg_s206x206_tt6&_nc_cat=111&ccb=1-7&_nc_sid=507b6b&_nc_ohc=trXffgelTh8Q7kNvwF3md8w&_nc_oc=AdlUYn7CISRiS_m1bRRegKBNqBZT2ygjD3uwnrjDGJ_2W4mBm4KMi7Bix3fnNY25D-ibqXzZyfBk0gRHvw-oUwMP&_nc_zt=23&_nc_ht=scontent.fktm21-1.fna&_nc_gid=NAXCXYaiJfRExyw6FCZ9mA&oh=00_AfuGjlD6gwDrmbf01-RwWbJ14G6DEmpUoyXsqX9zRZEA1Q&oe=69A6F892" class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://scontent.fktm21-2.fna.fbcdn.net/v/t39.30808-6/638220850_1516643639988362_207822705122642138_n.jpg?stp=c0.206.1424.1424a_dst-jpg_s206x206_tt6&_nc_cat=105&ccb=1-7&_nc_sid=507b6b&_nc_ohc=tjoIIeA6nnIQ7kNvwHwcwt2&_nc_oc=AdnqN2H7zDz3rqsIBx5AZty8tKQOWpyck3QG6pjgN_OpDfF1rWu0tpLkuqckzvBOxE2-DQxjpzHw3mMBQJzMBG_v&_nc_zt=23&_nc_ht=scontent.fktm21-2.fna&_nc_gid=PdMqPu_nzY3sPyCh00BJ_A&oh=00_AfvwQ5rj7908KEfDeEoX0j3KYOhLfXslEvBgj0EIdkCOHw&oe=69A7093B " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoH6TgjgCb6fACUfCGL8TDavLZ1g-_A3_4Y57pOIztRMxN-wZmlRRbNFMOgH5sOnAga2q292LxCsU32H1NMOCdGVq1qYbWghz0RYU3mueLhQnVqbSj8axS-ds-JP7fXE8YTBRFkNQ=w253-h113-k-no " class="w-full h-64 object-cover rounded-lg shadow">
            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwergubIMxFKX4WBxs601o1swPfLKg9-3xP5XRK6issViQd678Cx6ilohaATeZ9CCbrrQnGR4K5zg8pya-wtD_J9qzLwL9S3JO_hcKYZdiuZnVTpyTGmCbaso8o5jTnPcggs-Xg=w253-h337-k-no " class="w-full h-64 object-cover rounded-lg shadow">


            @foreach($guestImages as $image)
                <img src="{{ asset('storage/'.$image->image_path) }}"
                     class="w-full h-64 object-cover rounded-lg shadow">
            @endforeach

        </div>
    </div>

    

</div>
</section>

<!-- Image Preview Modal -->
<!-- Image Modal Slider -->
<div id="imageModal"
     class="fixed inset-0 bg-black bg-opacity-95 hidden flex items-center justify-center z-50">

    <!-- Close -->
    <span onclick="closeModal()"
          class="absolute top-5 right-8 text-white text-4xl cursor-pointer">
        ×
    </span>

    <!-- Prev -->
    <span onclick="prevImage()"
          class="absolute left-5 text-white text-5xl cursor-pointer">
        ❮
    </span>

    <!-- Image -->
    <img id="modalImage"
         class="max-w-[90%] max-h-[90%] rounded-lg">

    <!-- Next -->
    <span onclick="nextImage()"
          class="absolute right-5 text-white text-5xl cursor-pointer">
        ❯
    </span>

</div>

<script>

let images = [];
let currentIndex = 0;

function openModal(clickedImage) {

    images = document.querySelectorAll('.gallery-image');
    currentIndex = Array.from(images).indexOf(clickedImage);

    showImage();

    document.getElementById('imageModal').classList.remove('hidden');
}

function showImage() {
    let src = images[currentIndex].src;

    // remove google small size
    src = src.replace(/=w.*$/, '');

    document.getElementById('modalImage').src = src;
}

function closeModal() {
    document.getElementById('imageModal').classList.add('hidden');
}

function nextImage() {
    currentIndex++;
    if (currentIndex >= images.length) currentIndex = 0;
    showImage();
}

function prevImage() {
    currentIndex--;
    if (currentIndex < 0) currentIndex = images.length - 1;
    showImage();
}

</script>

@endsection