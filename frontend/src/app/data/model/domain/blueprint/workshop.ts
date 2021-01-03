import { Uuid } from '@model/shared/uuid';

export type Workshop = ElectronicWorkshop | PrintWorkshop | AssemblyWorkshop;

export interface ElectronicWorkshop {
  id: Uuid;
}

export interface PrintWorkshop {
  id: Uuid;
}

export interface AssemblyWorkshop {
  id: Uuid;
}
