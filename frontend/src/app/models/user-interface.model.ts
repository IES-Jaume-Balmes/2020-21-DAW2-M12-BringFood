export interface UserInterface {
	id?: number,
	role_id?: number,
  	name?: string,
  	email: string,
  	password: string,
  	documentType? : string,
    document? : string,
    prefix? : string,
    mobile? : string,
    phone? : string,
}
