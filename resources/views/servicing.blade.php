<!DOCTYPE html>
<html lang="en">
<head>
	<title>Social - Network, Community and Event Theme</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('import/assets/images/favicon.ico')}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/font-awesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/min/dropzone.min.css')}}" />
	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">
	 
</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>
  
  <!-- Container START -->
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center text-center vh-100">
      <!-- Offline START -->
      <div class="col-lg-6 mx-auto">
        <figure class="m-0">
          <!-- SVG START -->
          <svg class="col-sm-7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 716.1 451.4" style="enable-background:new 0 0 716.1 451.4;" xml:space="preserve">
            <style type="text/css">
              .st0{fill:#1C2B6B;}
              .st1{fill:url(#SVGID_1_);}
              .st2{fill:#192B59;}
              .st3{fill:url(#SVGID_00000038388629023320417420000011910910330242040765_);}
              .st4{fill:url(#SVGID_00000067951171843383945400000003322912109541428918_);}
              .st5{fill:url(#SVGID_00000039095792833142810140000016021449771341894833_);}
              .st6{fill:#20D357;}
              .st7{fill:#FFAC00;}
              .st8{fill:#E64D4E;}
              .st9{fill:url(#SVGID_00000011027212099421577340000008292384051277911706_);}
              .st10{fill:url(#SVGID_00000102521272465408276170000016176010782738911396_);}
              .st11{fill:url(#SVGID_00000047018358572728707230000010946618625964306322_);}
              .st12{fill:url(#SVGID_00000010277265322281719880000014572339278532832418_);}
              .st13{fill:url(#SVGID_00000124852301349158615690000016051245957760051639_);}
              .st14{fill:url(#SVGID_00000119806223366443053000000003620259396482464677_);}
              .st15{fill:url(#SVGID_00000056421693893999224880000000288784100719064765_);}
              .st16{fill:#0B1228;}
              .st17{fill:#FFD3BC;}
              .st18{fill:url(#SVGID_00000078747857454348502370000016850196134061136796_);}
              .st19{fill:url(#SVGID_00000085938116400839766310000011099871793578572944_);}
              .st20{fill:url(#SVGID_00000029024916187948008390000006703747384405802892_);}
              .st21{fill:url(#SVGID_00000183968665025633654430000003315030004643337878_);}
              .st22{fill:url(#SVGID_00000066474577168043135440000000224513798057904036_);}
              .st23{fill:#F2DAD4;}
              .st24{fill:url(#SVGID_00000101811096059611348280000008448259462885472931_);}
              .st25{fill:url(#SVGID_00000149362988496607264940000014269115312873910203_);}
            </style>
            <g id="Layer_1">
            </g>
            <g id="Layer_2">
              <g>
                <g>
                  <g>
                    <path class="st0" d="M439,428.5H332.1c-14.8,0-27.3-12.1-27-27c0.2-14.4,12-26,26.5-26h59.7c15.5,0,28.5-12.2,28.9-27.7
                      c0.4-16-12.5-29.1-28.4-29.1H276.3c-2.4-2.1-0.9-4.7,1.1-4.7h113.8c18.5,0,34,15.2,33.7,33.7c-0.3,18-15,32.5-33.1,32.5H332
                      c-11.9,0-21.9,9.3-22.2,21.1c-0.4,12.3,9.5,22.4,21.8,22.4h107.3c1.3,0,2.4,1,2.5,2.2C441.4,427.4,440.4,428.5,439,428.5z"/>
                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="433.4638" y1="425.6624" x2="457.5618" y2="425.6624">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.193" style="stop-color:#4190F5"/>
                      <stop  offset="0.7095" style="stop-color:#2274DD"/>
                      <stop  offset="1" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path class="st1" d="M445.5,437.7h12v-24.1h-12c-6.7,0-12,5.4-12,12l0,0C433.5,432.3,438.9,437.7,445.5,437.7z"/>
                    <g>
                      <path class="st2" d="M469.5,422.4h-5.6c-1.3,0-2.3-1-2.3-2.3l0,0c0-1.3,1-2.3,2.3-2.3h5.6c1.3,0,2.3,1,2.3,2.3l0,0
                        C471.8,421.4,470.7,422.4,469.5,422.4z"/>
                      <path class="st2" d="M469.5,433.5h-5.6c-1.3,0-2.3-1-2.3-2.3l0,0c0-1.3,1-2.3,2.3-2.3h5.6c1.3,0,2.3,1,2.3,2.3l0,0
                        C471.8,432.5,470.7,433.5,469.5,433.5z"/>
                    </g>
                    
                      <linearGradient id="SVGID_00000121273299412406755410000012011051663777196676_" gradientUnits="userSpaceOnUse" x1="454.6961" y1="425.6624" x2="468.943" y2="425.6624">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.193" style="stop-color:#4190F5"/>
                      <stop  offset="0.7095" style="stop-color:#2274DD"/>
                      <stop  offset="1" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000121273299412406755410000012011051663777196676_);" d="M458.9,440.1L458.9,440.1
                      c-2.3,0-4.2-1.9-4.2-4.2v-20.3c0-2.3,1.9-4.2,4.2-4.2h0c2.3,0,4.2,1.9,4.2,4.2v20.3C463.2,438.2,461.3,440.1,458.9,440.1z"/>
                  </g>
                  <g>
                    
                      <linearGradient id="SVGID_00000096760458073354237120000000850511327322928539_" gradientUnits="userSpaceOnUse" x1="0" y1="129.1342" x2="285.9457" y2="129.1342">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.193" style="stop-color:#4190F5"/>
                      <stop  offset="0.7095" style="stop-color:#2274DD"/>
                      <stop  offset="1" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000096760458073354237120000000850511327322928539_);" d="M268.2,167.3H17.8
                      c-9.8,0-17.8-8-17.8-17.8v-40.9c0-9.8,8-17.8,17.8-17.8h250.4c9.8,0,17.8,8,17.8,17.8v40.9C285.9,159.4,278,167.3,268.2,167.3z"
                      />
                    
                      <linearGradient id="SVGID_00000005260083219099119650000010349453214289411224_" gradientUnits="userSpaceOnUse" x1="94.9977" y1="172.9365" x2="94.9977" y2="150.2851">
                      <stop  offset="0" style="stop-color:#E5E5E5"/>
                      <stop  offset="0.4764" style="stop-color:#F4F4F4"/>
                      <stop  offset="1" style="stop-color:#FFFFFF"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000005260083219099119650000010349453214289411224_);" d="M164.5,167.3H25.5v-7
                      c0-5.2,4.2-9.4,9.4-9.4h120.3c5.2,0,9.4,4.2,9.4,9.4V167.3z"/>
                    <circle class="st6" cx="31.1" cy="120.8" r="5.6"/>
                    <circle class="st7" cx="47.6" cy="120.8" r="5.6"/>
                    <circle class="st8" cx="64.2" cy="120.8" r="5.6"/>
                    
                      <ellipse transform="matrix(0.1602 -0.9871 0.9871 0.1602 99.5971 358.7539)" class="st7" cx="260.6" cy="120.8" rx="12.5" ry="12.5"/>
                    <path class="st7" d="M240,125.3h-51.7c-1.5,0-2.8-1.2-2.8-2.8v-3.5c0-1.5,1.2-2.8,2.8-2.8H240c1.5,0,2.8,1.2,2.8,2.8v3.5
                      C242.7,124.1,241.5,125.3,240,125.3z"/>
                    <rect x="25.5" y="167.3" class="st0" width="235" height="13.4"/>
                  </g>
                  <g>
                    
                      <linearGradient id="SVGID_00000061441529741921042370000006764514692607469441_" gradientUnits="userSpaceOnUse" x1="0" y1="218.9345" x2="285.9457" y2="218.9345">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.193" style="stop-color:#4190F5"/>
                      <stop  offset="0.7095" style="stop-color:#2274DD"/>
                      <stop  offset="1" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000061441529741921042370000006764514692607469441_);" d="M268.2,257.1H17.8
                      c-9.8,0-17.8-8-17.8-17.8v-40.9c0-9.8,8-17.8,17.8-17.8h250.4c9.8,0,17.8,8,17.8,17.8v40.9C285.9,249.2,278,257.1,268.2,257.1z"
                      />
                    
                      <linearGradient id="SVGID_00000010996822925880914180000004437476068571962760_" gradientUnits="userSpaceOnUse" x1="94.9977" y1="262.7369" x2="94.9977" y2="240.0854">
                      <stop  offset="0" style="stop-color:#E5E5E5"/>
                      <stop  offset="0.4764" style="stop-color:#F4F4F4"/>
                      <stop  offset="1" style="stop-color:#FFFFFF"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000010996822925880914180000004437476068571962760_);" d="M164.5,257.1H25.5v-7
                      c0-5.2,4.2-9.4,9.4-9.4h120.3c5.2,0,9.4,4.2,9.4,9.4V257.1z"/>
                    <path class="st6" d="M36.7,210.6c0,3.1-2.5,5.6-5.6,5.6s-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6S36.7,207.6,36.7,210.6z"/>
                    <path class="st7" d="M53.2,210.6c0,3.1-2.5,5.6-5.6,5.6s-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6S53.2,207.6,53.2,210.6z"/>
                    <path class="st8" d="M69.8,210.6c0,3.1-2.5,5.6-5.6,5.6c-3.1,0-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6
                      C67.3,205.1,69.8,207.6,69.8,210.6z"/>
                    
                      <ellipse transform="matrix(0.9239 -0.3827 0.3827 0.9239 -60.7714 115.7734)" class="st7" cx="260.6" cy="210.6" rx="12.5" ry="12.5"/>
                    <path class="st7" d="M240,215.1h-51.7c-1.5,0-2.8-1.2-2.8-2.8v-3.5c0-1.5,1.2-2.8,2.8-2.8H240c1.5,0,2.8,1.2,2.8,2.8v3.5
                      C242.7,213.9,241.5,215.1,240,215.1z"/>
                    <rect x="25.5" y="257.1" class="st0" width="235" height="13.4"/>
                  </g>
                  <g>
                    
                      <linearGradient id="SVGID_00000098219695740302274300000006120888283699019421_" gradientUnits="userSpaceOnUse" x1="0" y1="308.7349" x2="285.9457" y2="308.7349">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.193" style="stop-color:#4190F5"/>
                      <stop  offset="0.7095" style="stop-color:#2274DD"/>
                      <stop  offset="1" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000098219695740302274300000006120888283699019421_);" d="M268.2,346.9H17.8
                      C8,346.9,0,339,0,329.2v-40.9c0-9.8,8-17.8,17.8-17.8h250.4c9.8,0,17.8,8,17.8,17.8v40.9C285.9,339,278,346.9,268.2,346.9z"/>
                    
                      <linearGradient id="SVGID_00000075120169871551534730000006251717186889279927_" gradientUnits="userSpaceOnUse" x1="94.9977" y1="352.5372" x2="94.9977" y2="329.8858">
                      <stop  offset="0" style="stop-color:#E5E5E5"/>
                      <stop  offset="0.4764" style="stop-color:#F4F4F4"/>
                      <stop  offset="1" style="stop-color:#FFFFFF"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000075120169871551534730000006251717186889279927_);" d="M164.5,346.9H25.5v-7
                      c0-5.2,4.2-9.4,9.4-9.4h120.3c5.2,0,9.4,4.2,9.4,9.4V346.9z"/>
                    <circle class="st6" cx="31.1" cy="300.4" r="5.6"/>
                    <circle class="st7" cx="47.6" cy="300.4" r="5.6"/>
                    <circle class="st8" cx="64.2" cy="300.4" r="5.6"/>
                    <circle class="st7" cx="260.6" cy="300.4" r="12.5"/>
                    <path class="st7" d="M240,304.9h-51.7c-1.5,0-2.8-1.2-2.8-2.8v-3.5c0-1.5,1.2-2.8,2.8-2.8H240c1.5,0,2.8,1.2,2.8,2.8v3.5
                      C242.7,303.7,241.5,304.9,240,304.9z"/>
                    <rect x="25.5" y="346.9" class="st0" width="235" height="13.4"/>
                  </g>
                  <g>
                    
                      <linearGradient id="SVGID_00000120555717968818916470000004743702535292423351_" gradientUnits="userSpaceOnUse" x1="0" y1="398.5352" x2="285.9457" y2="398.5352">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.193" style="stop-color:#4190F5"/>
                      <stop  offset="0.7095" style="stop-color:#2274DD"/>
                      <stop  offset="1" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000120555717968818916470000004743702535292423351_);" d="M268.2,436.7H17.8
                      C8,436.7,0,428.8,0,419v-40.9c0-9.8,8-17.8,17.8-17.8h250.4c9.8,0,17.8,8,17.8,17.8V419C285.9,428.8,278,436.7,268.2,436.7z"/>
                    
                      <linearGradient id="SVGID_00000165221176856712256900000006277106630233597370_" gradientUnits="userSpaceOnUse" x1="94.9977" y1="442.3376" x2="94.9977" y2="419.6861">
                      <stop  offset="0" style="stop-color:#E5E5E5"/>
                      <stop  offset="0.4764" style="stop-color:#F4F4F4"/>
                      <stop  offset="1" style="stop-color:#FFFFFF"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000165221176856712256900000006277106630233597370_);" d="M164.5,436.7H25.5v-7
                      c0-5.2,4.2-9.4,9.4-9.4h120.3c5.2,0,9.4,4.2,9.4,9.4V436.7z"/>
                    <path class="st6" d="M36.7,390.2c0,3.1-2.5,5.6-5.6,5.6s-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6S36.7,387.2,36.7,390.2z"/>
                    <path class="st7" d="M53.2,390.2c0,3.1-2.5,5.6-5.6,5.6s-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6S53.2,387.2,53.2,390.2z"/>
                    <path class="st8" d="M69.8,390.2c0,3.1-2.5,5.6-5.6,5.6c-3.1,0-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6
                      C67.3,384.7,69.8,387.2,69.8,390.2z"/>
                    
                      <ellipse transform="matrix(0.9239 -0.3827 0.3827 0.9239 -129.5015 129.4447)" class="st7" cx="260.6" cy="390.2" rx="12.5" ry="12.5"/>
                    <path class="st7" d="M240,394.7h-51.7c-1.5,0-2.8-1.2-2.8-2.8v-3.5c0-1.5,1.2-2.8,2.8-2.8H240c1.5,0,2.8,1.2,2.8,2.8v3.5
                      C242.7,393.5,241.5,394.7,240,394.7z"/>
                    <rect x="25.5" y="436.7" class="st0" width="235" height="13.4"/>
                  </g>
                </g>
                <g>
                  
                    <linearGradient id="SVGID_00000137129226461153485580000005490632567427690920_" gradientUnits="userSpaceOnUse" x1="412.4178" y1="267.1104" x2="457.8529" y2="303.7772">
                    <stop  offset="0" style="stop-color:#4E9CFF"/>
                    <stop  offset="0.193" style="stop-color:#4190F5"/>
                    <stop  offset="0.7095" style="stop-color:#2274DD"/>
                    <stop  offset="1" style="stop-color:#176AD4"/>
                  </linearGradient>
                  <path style="fill:url(#SVGID_00000137129226461153485580000005490632567427690920_);" d="M445.2,307.9h-35.4
                    c-6,0-10.9-4.9-10.9-10.9v-35.4c0-6,4.9-10.9,10.9-10.9h35.4c6,0,10.9,4.9,10.9,10.9V297C456.1,303,451.2,307.9,445.2,307.9z"/>
                  
                    <ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -72.2681 384.0805)" class="st0" cx="427.5" cy="279.3" rx="21" ry="21"/>
                  <g>
                    <path class="st16" d="M424.4,279.3c0,2.1-1.7,3.8-3.8,3.8c-2.1,0-3.8-1.7-3.8-3.8c0-2.1,1.7-3.8,3.8-3.8
                      C422.7,275.5,424.4,277.2,424.4,279.3z"/>
                    <path class="st16" d="M438.1,279.3c0,2.1-1.7,3.8-3.8,3.8c-2.1,0-3.8-1.7-3.8-3.8c0-2.1,1.7-3.8,3.8-3.8
                      C436.4,275.5,438.1,277.2,438.1,279.3z"/>
                  </g>
                </g>
                <g>
                  <g>
                    <path class="st17" d="M650,392.6c0,0-0.3,15,0,16.5c0.2,1.5-5.9,10.3-8.4,9.9c-2.5-0.4-7.5-1.2-8.2-2.1
                      c-0.7-0.8-0.4-2.8-0.1-4.6c0.3-1.8,2.1-18.1,2.1-18.9S647.2,390.3,650,392.6z"/>
                    
                      <linearGradient id="SVGID_00000032650754784418528610000011509742337524776585_" gradientUnits="userSpaceOnUse" x1="3466.9971" y1="424.2718" x2="3489.7415" y2="441.5132" gradientTransform="matrix(-1 0 0 1 4124.0176 0)">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.9844" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000032650754784418528610000011509742337524776585_);" d="M640.3,408.2c-3.1,1.7-4.9,6.8-5.3,6.9
                      c-0.4,0.1-1.3-0.1-1.3-0.6c0-0.5,0.1-2.2-0.4-2.2c-0.6,0-1.2,2.8-1.3,6.9c-0.1,4.1-1.6,13.8,0,15c1,0.8,10,5.5,10.3,6.2
                      c0.3,0.6-0.2,5.1,0.6,5.8c0.8,0.7,2.5,2.4,3.9,2.5c1.4,0.1,9.5,0.9,13.3,0c3.8-0.9,8.6-2.7,8.8-3.2c0.1-0.5-1-11.3-2.2-12.6
                      c-1.2-1.3-9.9-13.3-10.6-14.4c-0.7-1.1-1.2-3.7-1.2-5.2c0-1.5-1.4-4.9-3.9-5.7C648.2,406.6,642.7,406.9,640.3,408.2z"/>
                    <path class="st17" d="M558.8,401.2c0,0,0,8.7-0.3,10.2c-0.2,1.5,5.9,10.3,8.4,9.9c2.5-0.4,7.5-1.2,8.2-2.1
                      c0.7-0.8,0.4-2.8,0.1-4.6c-0.3-1.8-1.9-11.8-1.9-12.7C573.4,401.2,561.5,399,558.8,401.2z"/>
                    <path class="st2" d="M566.8,208.8c-3.5,12.9-10.2,56.9-10.2,78.4c0,21.4-2.1,76-2.1,84.3c0,8.3-0.9,28.9,1.3,30
                      c2.1,1.1,7.1,4.3,13.9,3.2c6.8-1.1,8.6-5.4,8.8-9.3c0.2-3.9,1.8-32.2,3.4-43.1c1.6-10.9,7.3-31.9,11.1-45.5
                      c3.8-13.5,12.5-40.7,14.8-40.6c2.3,0.1,16.8,59.7,18,63.1c1.2,3.4,3.5,51.4,3.7,55.4c0.1,4,0,7.9,2.5,9.5
                      c2.5,1.6,10.3,5.7,14.3,6c4,0.3,6.7-6.1,7.5-8.1c0.7-1.9,2.1-66.1,1.6-83.7c-0.5-17.6,0.9-50.4,0.1-61.1
                      c-0.8-10.7-3.4-33.6-5.1-38.5C648.6,204,566.8,208.8,566.8,208.8z"/>
                    
                      <linearGradient id="SVGID_00000077317450906889938040000013764768246011705231_" gradientUnits="userSpaceOnUse" x1="592.2368" y1="37.6823" x2="549.2192" y2="32.8818">
                      <stop  offset="0" style="stop-color:#F2BFAD"/>
                      <stop  offset="1" style="stop-color:#F2DAD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000077317450906889938040000013764768246011705231_);" d="M541.8,59.3
                      c3.4-3.8,19.1-21.5,22.3-22.1c3.1-0.6,10.7-2,12.4-3.8c1.7-1.8,8.9-24.3,6-28.4c-2.8-4.1-13.8-2.9-17.1,4
                      c-3.3,7-3.2,10.6-8.6,15.4c-5.5,4.8-29.4,24.3-31.6,26.3c-2.2,2,2.2,11.6,5.7,13.2C534.4,65.7,541.8,59.3,541.8,59.3z"/>
                    
                      <linearGradient id="SVGID_00000039128244350703429110000002452721561931330230_" gradientUnits="userSpaceOnUse" x1="540.7784" y1="91.4508" x2="687.394" y2="202.5925">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.9844" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000039128244350703429110000002452721561931330230_);" d="M585.4,64.7
                      c-8.1,1.7-21.4,3.1-25.8,4.5c-4.4,1.4-21.8,7.5-21.7,4.9c0.1-2.6,8.1-14,6.6-15.2c-1.4-1.2-10-2.6-11.4-4.4s-3.4-6.1-5.3-5.6
                      c-1.9,0.5-24.5,21.6-23,29.6c3.6,19,57,32.8,58.2,41.1c1.2,8.3-4.1,87.7-1.2,90.6c2.9,2.9,33.9,14.1,49.4,15.1
                      c15.6,1,42.9-4.5,44.4-8.6c1.5-4.1-7.6-83-6.5-83c1.1,0,1.4,24.8,13.2,31.3c7.8,4.2,18.6-0.1,20.7-2.5
                      c2.1-2.3-7.4-35.4-11.6-46.5c-4.3-11.1-8.3-34.1-18-42.3c-9.6-8.2-23.3-6.8-28-8.7c-4.7-1.9-20.4-0.5-24.4-1
                      C597,63.8,585.4,64.7,585.4,64.7z"/>
                    
                      <linearGradient id="SVGID_00000010999480841631744300000006154039538395125651_" gradientUnits="userSpaceOnUse" x1="688.3122" y1="154.1107" x2="690.5019" y2="191.2163">
                      <stop  offset="0" style="stop-color:#F2BFAD"/>
                      <stop  offset="0.7043" style="stop-color:#F2DAD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000010999480841631744300000006154039538395125651_);" d="M685.9,147.7c0,0-13.9,4.2-15,5.6
                      c-1.1,1.4-3,7.2,0,9.6c3,2.4,6.3,4.2,9.9,1.4c3.6-2.8,6.8-6.5,8.9-7c2.1-0.5,8.2,0.4,10.8-0.6c2.6-1,7.5-20.6,5.5-21.8
                      C704.1,133.8,685.9,147.7,685.9,147.7z"/>
                    <path class="st8" d="M585.4,62c-4.5-0.9-13.1-9.4-13.9-18c-0.8-8.4-6.9-31.9,14.5-40.7c20.1-8.3,40.8,0.2,43.8,10.5
                      c2.8,9.5-20.8,10-29.5,16.2c-8.7,6.2-9.2,10.3-11.4,9.4C586.7,38.3,585.4,62,585.4,62z"/>
                    
                      <linearGradient id="SVGID_00000116228463421775434830000009224830690794144428_" gradientUnits="userSpaceOnUse" x1="597.8173" y1="53.1239" x2="612.0406" y2="82.828">
                      <stop  offset="0" style="stop-color:#F2BFAD"/>
                      <stop  offset="1" style="stop-color:#F2DAD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000116228463421775434830000009224830690794144428_);" d="M585.1,45.3
                      c-0.3,3.8-1.2,22.4,0.4,25.1c1.5,2.5,4.1,9.8,14.4,9.5c10.3-0.3,16.9-10.6,17.5-11.8c0.6-1.2-0.6-16.1-0.6-18.5
                      c0-2.5-13.8-8.4-19.4-8.2C591.8,41.5,585.3,41.7,585.1,45.3z"/>
                    <path class="st23" d="M586,45.3c1.2,0-0.2,7,1.9,9.3C590,57,599.1,69,608.8,67.9c8.4-1,7.2-8.2,8.4-14.2
                      c1.1-5.4,4.6-5.9,5.8-19.9c0.5-5.4,3-14-1.7-15.5c-4.7-1.6-22.5-5.8-26.9,0c-4.4,5.8-4.8,19.6-7.1,17.9
                      c-2.3-1.8-7.1-10.5-10-5.8C574.5,35,579.8,45.5,586,45.3z"/>
                    
                      <linearGradient id="SVGID_00000028317027059592873680000014409038281422542487_" gradientUnits="userSpaceOnUse" x1="664.4503" y1="118.9148" x2="689.2134" y2="164.4704">
                      <stop  offset="0" style="stop-color:#F6DBDB"/>
                      <stop  offset="1" style="stop-color:#EB9A99"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000028317027059592873680000014409038281422542487_);" d="M660.7,117.3l-28.1,35.6
                      c-1.5,1.9-0.1,4.6,2.2,4.5l52-0.9c0.9,0,1.7-0.4,2.2-1.1l26.6-35.5c1.3-1.7,0-4.1-2.1-4.1l-50.7,0.4
                      C662,116.2,661.2,116.6,660.7,117.3z"/>
                    <path class="st17" d="M705.2,131.6c-2.7,0.3-6.7,1.8-6.7,3.2c0,1.4,3.2,1.8,4.1,2c0.9,0.1,2,0.4,1.7,0.8c-0.3,0.4-1,2.6-2.8,2.3
                      c-1.8-0.4-9.5-0.5-11-0.5c-1.5,0-3.2,1-3.4,2.1c-0.1,1.1-0.4,1.3-1.3,1.4c-0.9,0.1-2.5,0.9-2.5,2.3c0,1.4,3.5,2.7,3.5,3.2
                      c0,0.5,6.9,4.7,8.3,5.5c1.4,0.8,3.9,2.8,5.3,2.8c1.4,0,3.8-1.4,4-3.3c0.2-2,3-3.4,3-4.4c0-1-0.9-1.7-0.8-2.3
                      c0.1-0.6,2.6-1.5,2.6-3c0-1.5-1-3.6-1.1-4.3c-0.1-0.6-0.7-2-0.1-2.2c0.6-0.2,2.6-2,2.2-3.8C710,131.9,706.5,131.5,705.2,131.6z"
                      />
                    
                      <linearGradient id="SVGID_00000173871782266512904270000003387286754132782010_" gradientUnits="userSpaceOnUse" x1="551.5098" y1="426.6774" x2="574.2543" y2="443.9188">
                      <stop  offset="0" style="stop-color:#4E9CFF"/>
                      <stop  offset="0.9844" style="stop-color:#176AD4"/>
                    </linearGradient>
                    <path style="fill:url(#SVGID_00000173871782266512904270000003387286754132782010_);" d="M568.2,410.6c3.1,1.7,4.9,6.8,5.3,6.9
                      c0.4,0.1,1.3-0.1,1.3-0.6c0-0.5-0.1-2.2,0.4-2.2c0.6,0,1.2,2.8,1.3,6.9c0.1,4.1,1.6,13.8,0,15c-1,0.8-10,5.5-10.3,6.2
                      c-0.3,0.6,0.2,5.1-0.6,5.8c-0.8,0.7-2.5,2.4-3.9,2.5c-1.4,0.1-9.5,0.9-13.3,0c-3.8-0.9-8.6-2.7-8.8-3.2
                      c-0.1-0.5,1-11.3,2.2-12.6c1.2-1.3,9.9-13.3,10.6-14.4c0.7-1.1,1.2-3.7,1.2-5.2c0-1.5,1.4-4.9,3.9-5.7
                      C560.3,409,565.8,409.3,568.2,410.6z"/>
                  </g>
                </g>
              </g>
            </g>
          </svg>
          <!-- SVG END -->
        </figure>
        <!-- Offline info -->
        <h1 class="mb-2 display-5 mt-5">Hang on! We are under maintenance!</h1>
        <p class="col-sm-8 mx-auto">We apologize for any inconvenience caused. We've almost done.</p>
      </div>
      <!-- Offline START -->
    </div> 
    <!-- Row END -->
  </div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
 
<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

</body>
</html>