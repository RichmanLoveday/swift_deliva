const continueBtn = document.getElementById('continueBtn');
const businessBtn = document.getElementById('businessBtn');

let formDatas = {
    userDetails: {},
    businessDetails: {}
};


// Function to set multiple attributes at once
const setAttributes = (el, attrs) => {
    for (var key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
};

const toggleLGA = e => {
    console.log(e)
    let state = e.target.value; // Get value of state
    selectLGAOption = ["Select LGA..."], // Define this once so as not to repeat it multiple times
    lgaList = {
        Abia: [
            "Aba North",
            "Aba South",
            "Arochukwu",
            "Bende",
            "Ikwuano",
            "Isiala Ngwa North",
            "Isiala Ngwa South",
            "Isuikwuato",
            "Obi Ngwa",
            "Ohafia",
            "Osisioma",
            "Ugwunagbo",
            "Ukwa East",
            "Ukwa West",
            "Umuahia North",
            "muahia South",
            "Umu Nneochi"
        ],
        Adamawa: [
            "Demsa",
            "Fufure",
            "Ganye",
            "Gayuk",
            "Gombi",
            "Grie",
            "Hong",
            "Jada",
            "Larmurde",
            "Madagali",
            "Maiha",
            "Mayo Belwa",
            "Michika",
            "Mubi North",
            "Mubi South",
            "Numan",
            "Shelleng",
            "Song",
            "Toungo",
            "Yola North",
            "Yola South"
        ],
        AkwaIbom: [
            "Abak",
            "Eastern Obolo",
            "Eket",
            "Esit Eket",
            "Essien Udim",
            "Etim Ekpo",
            "Etinan",
            "Ibeno",
            "Ibesikpo Asutan",
            "Ibiono-Ibom",
            "Ika",
            "Ikono",
            "Ikot Abasi",
            "Ikot Ekpene",
            "Ini",
            "Itu",
            "Mbo",
            "Mkpat-Enin",
            "Nsit-Atai",
            "Nsit-Ibom",
            "Nsit-Ubium",
            "Obot Akara",
            "Okobo",
            "Onna",
            "Oron",
            "Oruk Anam",
            "Udung-Uko",
            "Ukanafun",
            "Uruan",
            "Urue-Offong Oruko",
            "Uyo"
        ],
        Anambra: [
            "Aguata",
            "Anambra East",
            "Anambra West",
            "Anaocha",
            "Awka North",
            "Awka South",
            "Ayamelum",
            "Dunukofia",
            "Ekwusigo",
            "Idemili North",
            "Idemili South",
            "Ihiala",
            "Njikoka",
            "Nnewi North",
            "Nnewi South",
            "Ogbaru",
            "Onitsha North",
            "Onitsha South",
            "Orumba North",
            "Orumba South",
            "Oyi"
        ],

        Anambra: [
            "Aguata",
            "Anambra East",
            "Anambra West",
            "Anaocha",
            "Awka North",
            "Awka South",
            "Ayamelum",
            "Dunukofia",
            "Ekwusigo",
            "Idemili North",
            "Idemili South",
            "Ihiala",
            "Njikoka",
            "Nnewi North",
            "Nnewi South",
            "Ogbaru",
            "Onitsha North",
            "Onitsha South",
            "Orumba North",
            "Orumba South",
            "Oyi"
        ],
        Bauchi: [
            "Alkaleri",
            "Bauchi",
            "Bogoro",
            "Damban",
            "Darazo",
            "Dass",
            "Gamawa",
            "Ganjuwa",
            "Giade",
            "Itas-Gadau",
            "Jama are",
            "Katagum",
            "Kirfi",
            "Misau",
            "Ningi",
            "Shira",
            "Tafawa Balewa",
            " Toro",
            " Warji",
            " Zaki"
        ],

        Bayelsa: [
            "Brass",
            "Ekeremor",
            "Kolokuma Opokuma",
            "Nembe",
            "Ogbia",
            "Sagbama",
            "Southern Ijaw",
            "Yenagoa"
        ],
        Benue: [
            "Agatu",
            "Apa",
            "Ado",
            "Buruku",
            "Gboko",
            "Guma",
            "Gwer East",
            "Gwer West",
            "Katsina-Ala",
            "Konshisha",
            "Kwande",
            "Logo",
            "Makurdi",
            "Obi",
            "Ogbadibo",
            "Ohimini",
            "Oju",
            "Okpokwu",
            "Oturkpo",
            "Tarka",
            "Ukum",
            "Ushongo",
            "Vandeikya"
        ],
        Borno: [
            "Abadam",
            "Askira-Uba",
            "Bama",
            "Bayo",
            "Biu",
            "Chibok",
            "Damboa",
            "Dikwa",
            "Gubio",
            "Guzamala",
            "Gwoza",
            "Hawul",
            "Jere",
            "Kaga",
            "Kala-Balge",
            "Konduga",
            "Kukawa",
            "Kwaya Kusar",
            "Mafa",
            "Magumeri",
            "Maiduguri",
            "Marte",
            "Mobbar",
            "Monguno",
            "Ngala",
            "Nganzai",
            "Shani"
        ],
        "Cross River": [
            "Abi",
            "Akamkpa",
            "Akpabuyo",
            "Bakassi",
            "Bekwarra",
            "Biase",
            "Boki",
            "Calabar Municipal",
            "Calabar South",
            "Etung",
            "Ikom",
            "Obanliku",
            "Obubra",
            "Obudu",
            "Odukpani",
            "Ogoja",
            "Yakuur",
            "Yala"
        ],

        Delta: [
            "Aniocha North",
            "Aniocha South",
            "Bomadi",
            "Burutu",
            "Ethiope East",
            "Ethiope West",
            "Ika North East",
            "Ika South",
            "Isoko North",
            "Isoko South",
            "Ndokwa East",
            "Ndokwa West",
            "Okpe",
            "Oshimili North",
            "Oshimili South",
            "Patani",
            "Sapele",
            "Udu",
            "Ughelli North",
            "Ughelli South",
            "Ukwuani",
            "Uvwie",
            "Warri North",
            "Warri South",
            "Warri South West"
        ],

        Ebonyi: [
            "Abakaliki",
            "Afikpo North",
            "Afikpo South",
            "Ebonyi",
            "Ezza North",
            "Ezza South",
            "Ikwo",
            "Ishielu",
            "Ivo",
            "Izzi",
            "Ohaozara",
            "Ohaukwu",
            "Onicha"
        ],
        Edo: [
            "Akoko-Edo",
            "Egor",
            "Esan Central",
            "Esan North-East",
            "Esan South-East",
            "Esan West",
            "Etsako Central",
            "Etsako East",
            "Etsako West",
            "Igueben",
            "Ikpoba Okha",
            "Orhionmwon",
            "Oredo",
            "Ovia North-East",
            "Ovia South-West",
            "Owan East",
            "Owan West",
            "Uhunmwonde"
        ],

        Ekiti: [
            "Ado Ekiti",
            "Efon",
            "Ekiti East",
            "Ekiti South-West",
            "Ekiti West",
            "Emure",
            "Gbonyin",
            "Ido Osi",
            "Ijero",
            "Ikere",
            "Ikole",
            "Ilejemeje",
            "Irepodun-Ifelodun",
            "Ise-Orun",
            "Moba",
            "Oye"
        ],
        Rivers: [
            "Port Harcourt",
            "Obio-Akpor",
            "Okrika",
            "Ogu–Bolo",
            "Eleme",
            "Tai",
            "Gokana",
            "Khana",
            "Oyigbo",
            "Opobo–Nkoro",
            "Andoni",
            "Bonny",
            "Degema",
            "Asari-Toru",
            "Akuku-Toru",
            "Abua–Odual",
            "Ahoada West",
            "Ahoada East",
            "Ogba–Egbema–Ndoni",
            "Emohua",
            "Ikwerre",
            "Etche",
            "Omuma"
        ],
        Enugu: [
            "Aninri",
            "Awgu",
            "Enugu East",
            "Enugu North",
            "Enugu South",
            "Ezeagu",
            "Igbo Etiti",
            "Igbo Eze North",
            "Igbo Eze South",
            "Isi Uzo",
            "Nkanu East",
            "Nkanu West",
            "Nsukka",
            "Oji River",
            "Udenu",
            "Udi",
            "Uzo Uwani"
        ],
        FCT: [
            "Abaji",
            "Bwari",
            "Gwagwalada",
            "Kuje",
            "Kwali",
            "Municipal Area Council"
        ],
        Gombe: [
            "Akko",
            "Balanga",
            "Billiri",
            "Dukku",
            "Funakaye",
            "Gombe",
            "Kaltungo",
            "Kwami",
            "Nafada",
            "Shongom",
            "Yamaltu-Deba"
        ],
        Imo: [
            "Aboh Mbaise",
            "Ahiazu Mbaise",
            "Ehime Mbano",
            "Ezinihitte",
            "Ideato North",
            "Ideato South",
            "Ihitte-Uboma",
            "Ikeduru",
            "Isiala Mbano",
            "Isu",
            "Mbaitoli",
            "Ngor Okpala",
            "Njaba",
            "Nkwerre",
            "Nwangele",
            "Obowo",
            "Oguta",
            "Ohaji-Egbema",
            "Okigwe",
            "Orlu",
            "Orsu",
            "Oru East",
            "Oru West",
            "Owerri Municipal",
            "Owerri North",
            "Owerri West",
            "Unuimo"
        ],
        Jigawa: [
            "Auyo",
            "Babura",
            "Biriniwa",
            "Birnin Kudu",
            "Buji",
            "Dutse",
            "Gagarawa",
            "Garki",
            "Gumel",
            "Guri",
            "Gwaram",
            "Gwiwa",
            "Hadejia",
            "Jahun",
            "Kafin Hausa",
            "Kazaure",
            "Kiri Kasama",
            "Kiyawa",
            "Kaugama",
            "Maigatari",
            "Malam Madori",
            "Miga",
            "Ringim",
            "Roni",
            "Sule Tankarkar",
            "Taura",
            "Yankwashi"
        ],
        Kaduna: [
            "Birnin Gwari",
            "Chikun",
            "Giwa",
            "Igabi",
            "Ikara",
            "Jaba",
            "Jema a",
            "Kachia",
            "Kaduna North",
            "Kaduna South",
            "Kagarko",
            "Kajuru",
            "Kaura",
            "Kauru",
            "Kubau",
            "Kudan",
            "Lere",
            "Makarfi",
            "Sabon Gari",
            "Sanga",
            "Soba",
            "Zangon Kataf",
            "Zaria"
        ],
        Kano: [
            "Ajingi",
            "Albasu",
            "Bagwai",
            "Bebeji",
            "Bichi",
            "Bunkure",
            "Dala",
            "Dambatta",
            "Dawakin Kudu",
            "Dawakin Tofa",
            "Doguwa",
            "Fagge",
            "Gabasawa",
            "Garko",
            "Garun Mallam",
            "Gaya",
            "Gezawa",
            "Gwale",
            "Gwarzo",
            "Kabo",
            "Kano Municipal",
            "Karaye",
            "Kibiya",
            "Kiru",
            "Kumbotso",
            "Kunchi",
            "Kura",
            "Madobi",
            "Makoda",
            "Minjibir",
            "Nasarawa",
            "Rano",
            "Rimin Gado",
            "Rogo",
            "Shanono",
            "Sumaila",
            "Takai",
            "Tarauni",
            "Tofa",
            "Tsanyawa",
            "Tudun Wada",
            "Ungogo",
            "Warawa",
            "Wudil"
        ],
        Katsina: [
            "Bakori",
            "Batagarawa",
            "Batsari",
            "Baure",
            "Bindawa",
            "Charanchi",
            "Dandume",
            "Danja",
            "Dan Musa",
            "Daura",
            "Dutsi",
            "Dutsin Ma",
            "Faskari",
            "Funtua",
            "Ingawa",
            "Jibia",
            "Kafur",
            "Kaita",
            "Kankara",
            "Kankia",
            "Katsina",
            "Kurfi",
            "Kusada",
            "Mai Adua",
            "Malumfashi",
            "Mani",
            "Mashi",
            "Matazu",
            "Musawa",
            "Rimi",
            "Sabuwa",
            "Safana",
            "Sandamu",
            "Zango"
        ],
        Kebbi: [
            "Aleiro",
            "Arewa Dandi",
            "Argungu",
            "Augie",
            "Bagudo",
            "Birnin Kebbi",
            "Bunza",
            "Dandi",
            "Fakai",
            "Gwandu",
            "Jega",
            "Kalgo",
            "Koko Besse",
            "Maiyama",
            "Ngaski",
            "Sakaba",
            "Shanga",
            "Suru",
            "Wasagu Danko",
            "Yauri",
            "Zuru"
        ],
        Kogi: [
            "Adavi",
            "Ajaokuta",
            "Ankpa",
            "Bassa",
            "Dekina",
            "Ibaji",
            "Idah",
            "Igalamela Odolu",
            "Ijumu",
            "Kabba Bunu",
            "Kogi",
            "Lokoja",
            "Mopa Muro",
            "Ofu",
            "Ogori Magongo",
            "Okehi",
            "Okene",
            "Olamaboro",
            "Omala",
            "Yagba East",
            "Yagba West"
        ],
        Kwara: [
            "Asa",
            "Baruten",
            "Edu",
            "Ekiti",
            "Ifelodun",
            "Ilorin East",
            "Ilorin South",
            "Ilorin West",
            "Irepodun",
            "Isin",
            "Kaiama",
            "Moro",
            "Offa",
            "Oke Ero",
            "Oyun",
            "Pategi"
        ],
        Lagos: [
            "Agege",
            "Ajeromi-Ifelodun",
            "Alimosho",
            "Amuwo-Odofin",
            "Apapa",
            "Badagry",
            "Epe",
            "Eti Osa",
            "Ibeju-Lekki",
            "Ifako-Ijaiye",
            "Ikeja",
            "Ikorodu",
            "Kosofe",
            "Lagos Island",
            "Lagos Mainland",
            "Mushin",
            "Ojo",
            "Oshodi-Isolo",
            "Shomolu",
            "Surulere"
        ],
        Nasarawa: [
            "Akwanga",
            "Awe",
            "Doma",
            "Karu",
            "Keana",
            "Keffi",
            "Kokona",
            "Lafia",
            "Nasarawa",
            "Nasarawa Egon",
            "Obi",
            "Toto",
            "Wamba"
        ],
        Niger: [
            "Agaie",
            "Agwara",
            "Bida",
            "Borgu",
            "Bosso",
            "Chanchaga",
            "Edati",
            "Gbako",
            "Gurara",
            "Katcha",
            "Kontagora",
            "Lapai",
            "Lavun",
            "Magama",
            "Mariga",
            "Mashegu",
            "Mokwa",
            "Moya",
            "Paikoro",
            "Rafi",
            "Rijau",
            "Shiroro",
            "Suleja",
            "Tafa",
            "Wushishi"
        ],
        Ogun: [
            "Abeokuta North",
            "Abeokuta South",
            "Ado-Odo Ota",
            "Egbado North",
            "Egbado South",
            "Ewekoro",
            "Ifo",
            "Ijebu East",
            "Ijebu North",
            "Ijebu North East",
            "Ijebu Ode",
            "Ikenne",
            "Imeko Afon",
            "Ipokia",
            "Obafemi Owode",
            "Odeda",
            "Odogbolu",
            "Ogun Waterside",
            "Remo North",
            "Shagamu"
        ],
        Ondo: [
            "Akoko North-East",
            "Akoko North-West",
            "Akoko South-West",
            "Akoko South-East",
            "Akure North",
            "Akure South",
            "Ese Odo",
            "Idanre",
            "Ifedore",
            "Ilaje",
            "Ile Oluji-Okeigbo",
            "Irele",
            "Odigbo",
            "Okitipupa",
            "Ondo East",
            "Ondo West",
            "Ose",
            "Owo"
        ],
        Osun: [
            "Atakunmosa East",
            "Atakunmosa West",
            "Aiyedaade",
            "Aiyedire",
            "Boluwaduro",
            "Boripe",
            "Ede North",
            "Ede South",
            "Ife Central",
            "Ife East",
            "Ife North",
            "Ife South",
            "Egbedore",
            "Ejigbo",
            "Ifedayo",
            "Ifelodun",
            "Ila",
            "Ilesa East",
            "Ilesa West",
            "Irepodun",
            "Irewole",
            "Isokan",
            "Iwo",
            "Obokun",
            "Odo Otin",
            "Ola Oluwa",
            "Olorunda",
            "Oriade",
            "Orolu",
            "Osogbo"
        ],
        Oyo: [
            "Afijio",
            "Akinyele",
            "Atiba",
            "Atisbo",
            "Egbeda",
            "Ibadan North",
            "Ibadan North-East",
            "Ibadan North-West",
            "Ibadan South-East",
            "Ibadan South-West",
            "Ibarapa Central",
            "Ibarapa East",
            "Ibarapa North",
            "Ido",
            "Irepo",
            "Iseyin",
            "Itesiwaju",
            "Iwajowa",
            "Kajola",
            "Lagelu",
            "Ogbomosho North",
            "Ogbomosho South",
            "Ogo Oluwa",
            "Olorunsogo",
            "Oluyole",
            "Ona Ara",
            "Orelope",
            "Ori Ire",
            "Oyo",
            "Oyo East",
            "Saki East",
            "Saki West",
            "Surulere"
        ],
        Plateau: [
            "Bokkos",
            "Barkin Ladi",
            "Bassa",
            "Jos East",
            "Jos North",
            "Jos South",
            "Kanam",
            "Kanke",
            "Langtang South",
            "Langtang North",
            "Mangu",
            "Mikang",
            "Pankshin",
            "Qua an Pan",
            "Riyom",
            "Shendam",
            "Wase"
        ],
        Sokoto: [
            "Binji",
            "Bodinga",
            "Dange Shuni",
            "Gada",
            "Goronyo",
            "Gudu",
            "Gwadabawa",
            "Illela",
            "Isa",
            "Kebbe",
            "Kware",
            "Rabah",
            "Sabon Birni",
            "Shagari",
            "Silame",
            "Sokoto North",
            "Sokoto South",
            "Tambuwal",
            "Tangaza",
            "Tureta",
            "Wamako",
            "Wurno",
            "Yabo"
        ],
        Taraba: [
            "Ardo Kola",
            "Bali",
            "Donga",
            "Gashaka",
            "Gassol",
            "Ibi",
            "Jalingo",
            "Karim Lamido",
            "Kumi",
            "Lau",
            "Sardauna",
            "Takum",
            "Ussa",
            "Wukari",
            "Yorro",
            "Zing"
        ],
        Yobe: [
            "Bade",
            "Bursari",
            "Damaturu",
            "Fika",
            "Fune",
            "Geidam",
            "Gujba",
            "Gulani",
            "Jakusko",
            "Karasuwa",
            "Machina",
            "Nangere",
            "Nguru",
            "Potiskum",
            "Tarmuwa",
            "Yunusari",
            "Yusufari"
        ],
        Zamfara: [
            "Anka",
            "Bakura",
            "Birnin Magaji Kiyaw",
            "Bukkuyum",
            "Bungudu",
            "Gummi",
            "Gusau",
            "Kaura Namoda",
            "Maradun",
            "Maru",
            "Shinkafi",
            "Talata Mafara",
            "Chafe",
            "Zurmi"
        ]
    }[state]; // Ternary switch operator to show list of LGAs based on chosen state

    lgas = [
        ...selectLGAOption,
        ...Object.values(lgaList)
    ], // Join select LGA option with list of LGAs

    lgaSelect = e.target.parentElement.parentElement.nextElementSibling.children[2].childNodes[1];

    // lgaSelect = document.querySelector(".select-lga"), // Get the LGA select element
    length = lgaSelect.options.length;
    // Get number of options already existing in LGA select element

    // Clear LGS select element
    for (i = length - 1; i >= 0; i --) {
        lgaSelect.options[i] = null;
    }

    // Populate LGA select element
    lgas.forEach(lga => {
        let opt = document.createElement("option"); // Create option element
        opt.appendChild(document.createTextNode(lga)); // Append LGA to it
        opt.value = lga;
        // Set the value to LGA

        // Make option asking you to select unclickable
        lga.includes("elect") ? setAttributes(opt, { // disabled: "disabled",
            selected: "selected"
        }) : "";

        // Add this option element to LGA select element
        lgaSelect.appendChild(opt);
    });
};
document.getElementById('state').addEventListener('change', toggleLGA);
document.getElementById('stateBus').addEventListener('change', toggleLGA);


// validate form
function create_account(e) {
    e.preventDefault();
    const firstName = document.querySelector(".firstName");
    const lastName = document.querySelector(".lastName");
    const email = document.querySelector(".email");
    const accountType = document.querySelector("#acct_type");
    const lgaSelect = document.querySelector("#lga");
    const state = document.querySelector("#state");
    const password = document.querySelector("#password");
    const confirmPassword = document.querySelector("#confirm_password");

    const url = e.target.dataset.url;
    let error = false;

    // Validate the input fields (you can add more specific validations as needed)
    if (firstName.value.trim() === "") {
        firstName.nextElementSibling.classList.remove('hidden');
        error = true;
    } else {
        firstName.nextElementSibling.classList.add('hidden');
        formDatas.userDetails.firstName = firstName.value;
    }

    if (lastName.value.trim() === "") {
        lastName.nextElementSibling.classList.remove('hidden');
        error = true;
    } else {
        lastName.nextElementSibling.classList.add('hidden');
        formDatas.userDetails.lastName = lastName.value;
    }


    if (! isValidEmail(email.value)) {
        email.nextElementSibling.classList.remove('hidden');
        error = true;
    } else {
        email.nextElementSibling.classList.add('hidden');
        formDatas.userDetails.email = email.value;
    }


    if (accountType.value === "0") {
        document.querySelector('.errorActType').classList.remove('hidden');
        error = true;
    } else {
        document.querySelector('.errorActType').classList.add('hidden');

    }


    if (state.value === "0") {
        document.querySelector('.errorState').classList.remove('hidden');
        error = true;
    } else {
        document.querySelector('.errorState').classList.add('hidden');
        formDatas.userDetails.state = state.value;

    }


    if (lgaSelect.value === "Select LGA...") {
        document.querySelector('.errorLga').classList.remove('hidden');
        error = true;
    } else {
        document.querySelector('.errorLga').classList.add('hidden');
        formDatas.userDetails.lga = lgaSelect.value;
    }


    if (password.value.trim() === "") {
        password.nextElementSibling.classList.remove('hidden');
        password.nextElementSibling.textContent = 'Please enter a password';
        error = true;
    } else if (password.value.trim().length < 5) {
        password.nextElementSibling.classList.remove('hidden');
        password.nextElementSibling.textContent = 'Password lenght is too short';
        error = true;
    } else {
        password.nextElementSibling.classList.add('hidden');
        formDatas.userDetails.password = password.value;
    }


    if (confirmPassword.value.trim() == '') {
        confirmPassword.nextElementSibling.classList.remove('hidden');
        confirmPassword.nextElementSibling.textContent = 'Please enter a password';
        error = true;

    } else if (password.value !== confirmPassword.value) {
        confirmPassword.nextElementSibling.classList.remove('hidden');
        confirmPassword.nextElementSibling.textContent = 'Passwords do not match';
        error = true;

    } else {
        confirmPassword.nextElementSibling.classList.add('hidden');
        formDatas.userDetails.confirmPassword = confirmPassword.value;
    }

    // check for account type
    if (! error && accountType.value == 'Business') { // store all data in an object
        e.target.closest('.create_account').classList.add('hidden');
        document.querySelector('.choose_business').classList.remove('hidden');
        document.querySelector('.choose_business').classList.add('flex');
    }

    if (! error && accountType.value == 'Customer') { // send data to ajax
        formDatas.type = 'customer';
        e.target.classList.add('disabled');
        async function test() {
            const res = await axios.post(url, formDatas, {"Content-Type": "multipart/form-data"});

            console.log(res.data);
            if (res.status == 200 && res.data.status == 'success') {
                display_msg(res.data.message);
                e.target.classList.remove('disbaled');
                setTimeout(() => {
                    window.location.href = res.data.redirect;
                }, 3000)
            }

            if (res.status == 200 && res.data.status == 'error') {
                email.nextElementSibling.classList.remove('hidden');
                email.nextElementSibling.textContent = res.data.errors.email;
            }
        }
        test();
    }

}

const create_business = e => {
    console.log(e);
    e.preventDefault();
    const bussinessName = document.querySelector(".busName");
    const busState = document.querySelector(".busState");
    const busLga = document.querySelector(".busLga");
    const url = e.target.dataset.url;
    let error = false;

    console.log(busLga.value, busState.value)

    if (bussinessName.value.trim() === "") {
        bussinessName.nextElementSibling.classList.remove('hidden');
        error = true;
    } else {
        bussinessName.nextElementSibling.classList.add('hidden');
        formDatas.businessDetails.companyName = bussinessName.value;
    }


    if (busState.value === "0") {
        document.querySelector('.errorState').classList.remove('hidden');
        error = true;
    } else {
        document.querySelector('.errorState').classList.add('hidden');
        formDatas.businessDetails.companyState = busState.value;
    }

    if (busLga.value === "0") {
        document.querySelector('.errorLga').classList.remove('hidden');
        error = true;
    } else {
        document.querySelector('.errorLga').classList.add('hidden');
        formDatas.businessDetails.companyLga = busLga.value;
    }


    if (! error) { // send data to ajax
        formDatas.type = 'business';
        e.target.classList.add('disabled');
        async function test() {
            const res = await axios.post(url, formDatas, {"Content-Type": "multipart/form-data"});
            if (res.status == 200 && res.data.status == 'success') {
                display_msg(res.data.message);
                e.target.classList.remove('disabled');
                setTimeout(() => {
                    window.location.href = res.data.redirect;
                }, 3000)
            }

            if (res.status == 200 && res.data.status == 'error') {
                e.target.closest('.choose_business').classList.add('hidden');
                document.querySelector('.create_account').classList.remove('hidden');
                document.querySelector('.create_account').classList.add('flex');

                document.querySelector('.email').nextElementSibling.classList.remove('hidden');
                document.querySelector('.email').nextElementSibling.textContent = res.data.errors.email;
            }

            if (res.status == 200 && res.data.status == 'failed') {}
        }
        test();
    }


};
businessBtn.addEventListener('click', create_business);
continueBtn.addEventListener('click', create_account);

function isValidEmail(email) { // Regular expression for email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}


function display_msg(text) {
    Swal.fire({
        text: text,
        toast: true,
        position: 'top-end',
        timer: 2000,
        type: 'error',
        timerProgressBar: true,
        showCancelButton: false,
        showConfirmButton: false,
        didOpen: () => {
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    })

}
