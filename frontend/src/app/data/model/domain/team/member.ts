import { Grant } from '@model/domain/team/grant';
import { Invitation } from '@model/domain/team/invitation';
import { MemberStatus } from '@model/domain/team/member-status';
import { User } from '@model/domain/user/user';
import { Uuid } from '@model/shared/uuid';

export interface Member {
  id: Uuid;
  status: MemberStatus;
  invitation: Invitation | null;
  grants: Grant[];
  user: User;
}
