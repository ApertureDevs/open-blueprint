import { Member } from '@model/domain/team/member';
import { Uuid } from '@model/shared/uuid';

export interface Team {
  id: Uuid;
  members: Member[];
}
