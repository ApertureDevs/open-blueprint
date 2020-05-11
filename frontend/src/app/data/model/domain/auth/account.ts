import { Uuid } from '@model/shared/uuid';

export interface Account {
  id: Uuid;
  login: string;
}
