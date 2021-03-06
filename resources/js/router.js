import Vue from "vue";
import VueRouter from "vue-router";
import Welcome from "./components/Welcome";
import BirthdaysIndex from "./views/BirthdaysIndex";
import EmployerType from "./views/EmployerType";
import EmployeeType from "./views/EmployeeType";
import Sez from "./views/Sez";
import EmployerCreate from "./views/EmployerCreate";
import EmployeeCreate from "./views/EmployeeCreate";
import AccountType from "./views/AccountType";
import AccountRelationship from "./views/AccountRelationship";
import BankName from "./views/BankName";
import RepPosition from "./views/RepPosition";
import IdTypes from "./views/IdTypes";
import Transaction from "./views/Transaction";
import PaymentMethod from "./views/PaymentMethod";
import Irp5Codes from "./views/Irp5Codes";
import Country from "./views/Country";
import Sic7 from "./views/Sic7";
import Activity from "./views/Activity";
import ActivityCodes from "./views/ActivityCodes";
import Admin from "./views/Admin";
import Logout from "./Actions/Logout";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/",
            component: Welcome,
            meta: { title: "Welcome" }
        },
        {
            path: "/logout",
            component: Logout
        },
        {
            path: "/employertype",
            component: EmployerType,
            meta: { title: "Employer Type" }
        },
        {
            path: "/employeetype",
            component: EmployeeType,
            meta: { title: "Employee Type" }
        },
        {
            path: "/sez",
            component: Sez,
            meta: { title: "Special Economic Zone" }
        },
        {
            path: "/employer/create",
            component: EmployerCreate,
            meta: { title: "Employer functions" }
        },
        {
            path: "/employee/create",
            component: EmployeeCreate,
            meta: { title: "Employee functions" }
        },
        {
            path: "/accounttype",
            component: AccountType,
            meta: { title: "Add New Account Type" }
        },
        {
            path: "/accountrelationship",
            component: AccountRelationship,
            meta: { title: "Add New Account Relationship" }
        },
        {
            path: "/bankname",
            component: BankName,
            meta: { title: "Add New Bank Name" }
        },
        {
            path: "/repposition",
            component: RepPosition,
            meta: { title: "Add New Rep Position" }
        },
        {
            path: "/idtypes",
            component: IdTypes,
            meta: { title: "Add Other ID Types" }
        },
        {
            path: "/transaction",
            component: Transaction,
            meta: { title: "Add Transaction" }
        },
        {
            path: "/paymethod",
            component: PaymentMethod,
            meta: { title: "Add Payment Method" }
        },
        {
            path: "/irp5codes",
            component: Irp5Codes,
            meta: { title: "Add IRP5 Codes" }
        },
        {
            path: "/country",
            component: Country,
            meta: { title: "Add Country" }
        },
        {
            path: "/sic7",
            component: Sic7,
            meta: { title: "Add SIC7" }
        },
        {
            path: "/activity",
            component: Activity,
            meta: { title: "Add Activity" }
        },
        {
            path: "/activitycodes",
            component: ActivityCodes,
            meta: { title: "Add Activity Codes" }
        },
        {
            path: "/admin",
            component: Admin,
            meta: { title: "Admin Functions" }
        }
    ],
    mode: "history"
});
